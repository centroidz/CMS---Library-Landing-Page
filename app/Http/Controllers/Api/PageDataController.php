<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\User;
use App\Models\Announcement;

class PageDataController extends Controller
{
    public function landingPageData()
    {
        $page = LandingPage::find(1);
        $staff = User::where('role', 'admin')->where('is_public', 1)->limit(3)->get();
        $news = Announcement::latest()->limit(5)->get();

        if (!$page) {
            return response()->json(['error' => 'No page published yet'], 404);
        }

        return response()->json([
            'layout' => $page->template,
            'title' => $page->title,
            'description' => $page->description,
            'button' => $page->button,
            'image' => $page->image ? asset('storage/' . $page->image) : asset('images/defaults/landing-default.png'),
            'mission' => $page->mission,
            'vision' => $page->vision,
            'goals' => $page->goals,
            'related_links' => $page->related_links,
            'staff' => $staff->map(function ($user) {
                return [
                    'name' => $user->name,
                    'role' => $user->role,
                    'profile_image' => $user->profile_image ? asset('storage/' . $user->profile_image) : null,
                    'social_media' => $user->social_media
                ];
            }),
            'news' => $news->map(function ($item) {
                return [
                    'title' => $item->title,
                    'content' => $item->content,
                    'image' => $item->image ? asset('storage/' . $item->image) : asset('images/defaults/image-default.png'),
                    'created_at' => $item->created_at,
                ];
            })
        ])->header('Access-Control-Allow-Origin', '*');
    }

}
