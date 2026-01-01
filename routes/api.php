<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\PageDataController;
use App\Http\Controllers\TemplateController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// The route the Public Site fetches to get the JSON
Route::get('/public/page-data', [TemplateController::class, 'getPageData']);
Route::get('/page/landingPage', [PageDataController::class, 'landingPageData']);

// Landing Page Routes
Route::get('/landing', [LandingPageController::class, 'show']); // Public landing page
Route::get('/landing/preview', [LandingPageController::class, 'preview']);
Route::post('/landing/save', [LandingPageController::class, 'save']);

// Page Content Route
Route::get('/page/{slug}', [PageController::class, 'getPageContent']);

// Auth Routes
// 1. Google Auth Routes
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// 2. Public Testimonials
Route::get('/testimonials', [TestimonialController::class, 'index']);

// 3. Protected Routes (Require Login)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::put('/testimonials/{id}', [TestimonialController::class, 'update']);
    Route::post('/testimonials', [TestimonialController::class, 'store']);
    Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy']);

    // Existing user route
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
