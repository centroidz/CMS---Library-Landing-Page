<?php

namespace App\Http\Controllers;

use App\Models\Page;
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
        return view('admin.index', compact('pages'));
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
        return view('admin.staff', compact('users'));
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
}
