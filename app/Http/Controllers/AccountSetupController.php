<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountSetupController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        // Decode JSON if it exists, or provide empty defaults
        $socials = $user->social_media ? json_decode($user->social_media, true) : [];

        return view('auth.setup-account', compact('user', 'socials'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // 🔒 Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'required|min:8|confirmed',
            'age' => 'required|integer|min:18',
            'sex' => 'required|in:Male,Female,Other',
            'phone_number' => 'required|string|max:20',

            // 🌐 Social Media Validations
            'social_media.facebook' => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/(profile\.php\?id=\d+|[A-Za-z0-9\.]+)\/?$/'
            ],
            'social_media.twitter' => [
                'nullable',
                'url',
                'regex:/^^(https?:\/\/)?(www\.)?x\.com\/[A-Za-z0-9_]+\/?$/'
            ],
            'social_media.instagram' => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9_.]+\/?$/'
            ],
            'social_media.github' => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?github\.com\/[A-Za-z0-9_-]+\/?$/'
            ],
            'social_media.linkedin' => [
                'nullable',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[A-Za-z0-9_-]+\/?$/'
            ],
        ];

        // 🧠 Custom error messages (Option 2)
        $messages = [
            'social_media.facebook.regex' => 'Please enter a valid Facebook profile link.',
            'social_media.twitter.regex' => 'Please enter a valid Twitter profile link.',
            'social_media.instagram.regex' => 'Please enter a valid Instagram profile link.',
            'social_media.github.regex' => 'Please enter a valid GitHub profile link.',
            'social_media.linkedin.regex' => 'Please enter a valid LinkedIn profile link.',
        ];

        // 🚦 Validate request
        $validated = $request->validate($rules, $messages);

        // 📝 Save user data
        $user->forceFill([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'age' => $validated['age'],
            'sex' => $validated['sex'],
            'phone_number' => $validated['phone_number'],
            'social_media' => json_encode($validated['social_media'] ?? []),
            'email_verified_at' => now(),
        ])->save();

        // 🚀 Redirect
        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Account setup complete! Welcome.');
    }
}
