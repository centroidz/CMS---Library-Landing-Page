<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\LandingPage;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function getPageContent($slug)
    {
        // 1. Find the page in the database
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            return response()->json(['error' => 'Page not found'], 404);
        }

        // 2. If it's the Landing Page, handle the template logic
        if ($slug === 'landing') {
            $data = LandingPage::first();
            $template = $data->template ?? 'hero-left';
            // Return the specific partial based on the chosen template
            return view("templates.partials.{$template}_content", $data->toArray())->render();
        }

        // 3. If it's a Custom (GrapesJS) Page, return the saved design
        if (!$page->is_default) {
            return "<style>{$page->css_content}</style>" . $page->html_content;
        }

        // 4. Handle System Defaults (Staff, Announcements, etc.)
        // We look for a blade file named after the slug
        if (view()->exists("public.{$slug}")) {
            return view("public.{$slug}")->render();
        }

        return "Content for {$page->title} is coming soon.";
    }
}
