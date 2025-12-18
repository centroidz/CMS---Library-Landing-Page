<?php

use Illuminate\Support\Facades\Route;
use App\Models\LandingPage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

// Dashboard Route
Route::get('/admin/dashboard', function () {
    return view('admin.index'); // Points to resources/views/admin/index.blade.php
})->name('admin.dashboard');

// Landing Page Editor Route
Route::get('/admin/landing-page', function () {
    // Get the first record, or create a blank object if none exists
    // to avoid "property of non-object" errors.
    $page = LandingPage::first() ?? new LandingPage([
        'template' => 'hero-left',
        'title' => 'Default Title',
        'description' => 'Default Description',
        'button' => 'Get Started'
    ]);

    return view('admin.landing-page', compact('page'));
})->name('admin.landing-page');

// Staff Management Route
Route::get('/admin/staff', function () {
    return view('admin.staff');
})->name('admin.staff');

// Announcement Route
Route::get('/admin/announcements', function () {
    return view('admin.announcements');
})->name('admin.announcements');

