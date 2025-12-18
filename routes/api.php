<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\LandingPage;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// PREVIEW ROUTE
Route::get('/landing/preview', function (Request $request) {
    // We pass all request parameters (title, mission, vision, etc.) to the template
    return response()
        ->view('templates.' . $request->template, $request->all())
        ->header('Access-Control-Allow-Origin', '*');
});

// SAVE ROUTE
Route::post('/landing/save', function (Request $request) {
    LandingPage::updateOrCreate(
        ['id' => 1],
        [
            'template' => $request->template,
            'title' => $request->title,
            'description' => $request->description,
            'button' => $request->button,
            'mission' => $request->mission,
            'vision' => $request->vision,
            'goals' => $request->goals,
            'related_links' => $request->related_links,
        ]
    );

    return response()->json(['status' => 'saved']);
});

// PUBLIC DATA ROUTE
Route::get('/landing', function () {
    $page = LandingPage::find(1);

    if (!$page) {
        return response('No page published yet', 404);
    }

    // Convert the Eloquent model to an array to pass all fields to the view
    return response()
        ->view('templates.' . $page->template, $page->toArray())
        ->header('Access-Control-Allow-Origin', '*');
});
