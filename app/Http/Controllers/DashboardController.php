<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\LandingPage; // Added this
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('admin.staff');
    }

    // Announcements view
    public function announcementsIndex()
    {
        return view('admin.announcements');
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
