<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $user = Auth::user();
        // social_media is already cast to array in the model
        $socials = $user->social_media ?? [];

        return view('admin.profile.edit', compact('user', 'socials'));
    }

    /**
     * Update profile information (excluding sensitive auth fields).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'age' => 'required|integer|min:18',
            'sex' => 'required|in:Male,Female,Other',
            'phone_number' => 'required|string|max:20',
            'social_media.facebook' => 'nullable|url',
            'social_media.twitter' => 'nullable|url',
            'social_media.instagram' => 'nullable|url',
            'social_media.github' => 'nullable|url',
            'social_media.linkedin' => 'nullable|url',
        ]);

        $user->update([
            'age' => $validated['age'],
            'sex' => $validated['sex'],
            'phone_number' => $validated['phone_number'],
            'social_media' => $validated['social_media'],
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();

        // Verify password before deletion for extra security (Optional but recommended)
        $request->validate([
            'delete_password' => 'required|current_password',
        ]);

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Your account has been deleted.');
    }
}
