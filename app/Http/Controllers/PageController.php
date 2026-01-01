<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\LandingPage;
use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function getPageContent($slug)
    {
        // 1. Find the page in the database
        $page = Page::where('slug', $slug)->first();
        $staff = User::where('role', 'admin')->limit(3)->get();
        $news = Announcement::latest()->limit(5)->get();

        if (!$page) {
            return response()->json(['error' => 'Page not found'], 404);
        }

        // 2. If it's the Landing Page, handle the template logic
        if ($slug === 'landing') {
            $data = LandingPage::first();
            $template = $data->template ?? 'default';

            // Merge everything into one array for the view
            $viewData = array_merge($data->toArray(), [
                'staff' => $staff,
                'news' => $news // Passing the new data
            ]);

            return view("templates.partials.{$template}_content", $viewData)->render();
        }

        // 3. If it's a Custom (GrapesJS) Page, return the saved design
        if (!$page->is_default) {
            return "<style>{$page->css_content}</style>" . $page->html_content;
        }

        // 4. For Default Pages, return the corresponding view
        if ($slug === 'staff-page') {
            $showcasedStaff = \App\Models\User::where('is_public', true)->get();

            // Use response()->make() to attach headers to the HTML string
            return response()->make(
                view('public.staff-page', ['users' => $showcasedStaff])->render(),
                200,
                ['Content-Type' => 'text/html']
            );
        }

        if (view()->exists("public.{$slug}")) {
            return view("public.{$slug}")->render();
        }


        return "Content for {$page->title} is coming soon.";
    }
}
