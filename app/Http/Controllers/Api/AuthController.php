<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // 1. Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // 2. Handle Callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Find or Create User
            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'role' => 'user', // OR create a new role 'user' in your ENUM
                    'password' => bcrypt(Str::random(16)), // Random password
                ]
            );

            // Create API Token
            $token = $user->createToken('landing-page-token')->plainTextToken;

            // Redirect back to your STATIC frontend with the token
            $frontendUrl = "https://keeperlibrary.online/?token=" . $token;
            
            return redirect($frontendUrl);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Login failed'], 500);
        }
    }
    
    // 3. Get Current User (to show avatar on frontend)
    public function me() {
        return response()->json(auth()->user());
    }
}