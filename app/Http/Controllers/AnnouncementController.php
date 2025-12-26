<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    // Public View
    public function indexPublic()
    {
        // Fetch announcements for the public list (excluding the preview item which is handled in blade)
        $announcements = Announcement::latest()->get();
        return view('public.announcements', compact('announcements'));
    }

    // Admin View
    public function indexAdmin()
    {
        $announcements = Announcement::latest()->get();
        return view('admin.announcements', compact('announcements'));
    }

    // API: Store
    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        Announcement::create($request->only('title', 'content'));
        return response()->json(['success' => true]);
    }

    // API: Update
    public function update(Request $request, $id)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $announcement = Announcement::findOrFail($id);
        $announcement->update($request->only('title', 'content'));
        return response()->json(['success' => true]);
    }

    // API: Delete
    public function destroy($id)
    {
        Announcement::destroy($id);
        return response()->json(['success' => true]);
    }
}