<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageRequest;
use App\Models\User;
use App\Models\LandingPage; // Added this
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    // List all pages on the dashboard
    public function index()
    {
        $pages = Page::orderBy('order_index', 'asc')->get();
        
        // Fetch pending requests for Admin
        $pendingRequests = [];
        if(auth()->user()->role === 'admin'){
            $pendingRequests = PageRequest::where('status', 'pending')->with('user')->get();
        }

        // Fetch my requests (for Editor notification)
        $myRequests = PageRequest::where('user_id', auth()->id())->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.index', compact('pages', 'pendingRequests', 'myRequests'));
    }

    // Create a new dynamic page
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'is_default' => false,
            'order_index' => Page::count() + 1,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'New page created!');
    }

    // Delete a page
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Page deleted successfully!');
    }

    // Handle Landing Page logic (moved from web.php)
    public function landingEdit()
    {
        $page = LandingPage::first() ?? new LandingPage([
            'template' => 'hero-left',
            'title' => 'Default Title',
            'description' => 'Default Description',
            'button' => 'Get Started'
        ]);

        return view('admin.landing-page', compact('page'));
    }

    // Staff view
    public function staffIndex()
    {

        $users = User::where('id', '!=', auth()->id())->get();

        return view('admin.staff', compact('users'));

    }

    // Announcements view
    public function announcementsIndex()
    {
        return view('admin.announcements');
    }

    public function staffPage()
    {
        // Fetch all users to list them in the Control Panel
        $users = User::all();

        // We pass a 'page' object or null to satisfy your layout variables
        return view('admin.staff-page', compact('users'));
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $user->name = $request->name;
        $user->is_public = $request->is_public === 'true' ? 1 : 0;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            // Store new image
            $path = $request->file('image')->store('staff', 'public');
            $user->profile_image = $path;
        }

        $user->save();

        return response()->json(['success' => true]);
    }

    public function publicStaffView()
    {
        // 1. Fetch only users marked for showcase
        $showcasedStaff = \App\Models\User::where('is_public', true)->get();

        // 2. Return the public-facing view file
        return view('public.staff-page', [
            'users' => $showcasedStaff
        ]);
    }
    public function editor($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.editor', compact('page'));
    }

    public function saveEditor(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        // We match the keys to your Model: html_content and css_content
        $page->update([
            'html_content' => $request->html, // 'html' comes from the JS fetch
            'css_content' => $request->css,  // 'css' comes from the JS fetch
        ]);

        return response()->json(['success' => true]);
    }

    // --- PAGE REQUEST LOGIC ---

    // Editor submits a request
    public function storePageRequest(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);

        // Check for duplicate pending requests
        $exists = PageRequest::where('user_id', auth()->id())
            ->where('title', $request->title)
            ->where('status', 'pending')
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'You already have a pending request for this page.'], 422);
        }

        PageRequest::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'status' => 'pending'
        ]);

        return response()->json(['message' => 'Request sent to Admin successfully!']);
    }

    // Admin Approves a request
    public function approveRequest($id)
    {
        $req = PageRequest::findOrFail($id);

        if ($req->status !== 'pending') {
            return back()->with('error', 'Request already processed.');
        }

        Page::create([
            'title' => $req->title,
            'slug' => Str::slug($req->title),
            'is_default' => false,
            'order_index' => Page::count() + 1,
        ]);

        $req->update(['status' => 'approved']);

        return back()->with('success', "Page '{$req->title}' created successfully!");
    }

    // Admin Rejects a request
    public function rejectRequest($id)
    {
        $req = PageRequest::findOrFail($id);
        $req->update(['status' => 'rejected']);

        return back()->with('success', 'Request rejected.');
    }

    public function destroyPageRequest($id)
    {
        // Find the request, ensuring it belongs to the logged-in user
        $req = PageRequest::where('user_id', auth()->id())->findOrFail($id);

        // Optional: specific check if you strictly want to prevent deleting 'pending' requests
        if ($req->status === 'pending') {
             return back()->with('error', 'You cannot delete a pending request.');
        }

        $req->delete();

        return back()->with('success', 'Notification removed.');
    }
}
