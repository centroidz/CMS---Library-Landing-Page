<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'title' => 'required', 
            'content' => 'required',
            'image' => 'nullable|image|max:5120' // Max 5MB
        ]);

        $data = $request->only('title', 'content');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('announcements', 'public');
        }

        Announcement::create($data);
        return response()->json(['success' => true]);
    }

    // API: Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 
            'content' => 'required',
            'image' => 'nullable|image|max:5120'
        ]);

        $announcement = Announcement::findOrFail($id);
        $data = $request->only('title', 'content');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($announcement->image) {
                Storage::disk('public')->delete($announcement->image);
            }
            $data['image'] = $request->file('image')->store('announcements', 'public');
        }

        $announcement->update($data);
        return response()->json(['success' => true]);
    }

    // API: Delete
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        
        if ($announcement->image) {
            Storage::disk('public')->delete($announcement->image);
        }
        
        $announcement->delete();
        return response()->json(['success' => true]);
    }
}