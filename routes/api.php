<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\LandingPage;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/landing', function (Request $request) {

//     $template = $request->query('template', 'hero-left');

//     return response()
//         ->view('templates.' . $template, [
//             'title' => $request->query('title', 'Default Title'),
//             'description' => $request->query('description', 'Default description'),
//             'button' => $request->query('button', 'Click Me'),
//         ])
//         ->header('Access-Control-Allow-Origin', '*')
//         ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
//         ->header('Access-Control-Allow-Headers', '*');
// });

Route::get('/landing/preview', function (Request $request) {

    return response()
        ->view('templates.' . $request->template, [
            'title' => $request->title,
            'description' => $request->description,
            'button' => $request->button,
        ])
        ->header('Access-Control-Allow-Origin', '*');
});

Route::post('/landing/save', function (Request $request) {

    LandingPage::updateOrCreate(
        ['id' => 1], // single landing page for now
        [
            'template' => $request->template,
            'title' => $request->title,
            'description' => $request->description,
            'button' => $request->button,
        ]
    );

    return response()->json(['status' => 'saved']);
});


Route::get('/landing', function () {

    $page = LandingPage::find(1);

    if (!$page) {
        return response('No page published yet', 404);
    }

    return response()
        ->view('templates.' . $page->template, [
            'title' => $page->title,
            'description' => $page->description,
            'button' => $page->button,
        ])
        ->header('Access-Control-Allow-Origin', '*');
});
