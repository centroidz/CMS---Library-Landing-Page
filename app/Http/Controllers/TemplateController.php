<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPage;
use App\Models\User;
use App\Models\Announcement;

class TemplateController extends Controller
{
    public function renderTemplate($layout)
    {
        // Check if the file exists first to avoid the ugly error
        if (!view()->exists("templates.{$layout}")) {
            // If it can't find landing.blade.php, it will show this:
            abort(404, "Template file 'resources/views/templates/{$layout}.blade.php' is missing.");
        }

        // Return the view with NO data.
        // The JavaScript 'postMessage' will fill it in later.
        return view("templates.{$layout}");
    }
}
