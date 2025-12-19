<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Public Route
Route::get('/', function () {
    return view('welcome');
});

// Admin Redirection
Route::redirect('/admin', '/admin/dashboard');

// Admin Group
Route::prefix('admin')->group(function () {
    // Dashboard / Page List
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/pages/store', [DashboardController::class, 'store'])->name('pages.store');
    Route::delete('/pages/{id}', [DashboardController::class, 'destroy'])->name('pages.destroy');

    // Content Management
    Route::get('/landing-page', [DashboardController::class, 'landingEdit'])->name('admin.landing-page');
    Route::get('/staff', [DashboardController::class, 'staffIndex'])->name('admin.staff');
    Route::get('/announcements', [DashboardController::class, 'announcementsIndex'])->name('admin.announcements');

    // Inside the Route::prefix('admin')->group(...)
    Route::get('/editor/{id}', [DashboardController::class, 'editor'])->name('admin.editor');
    Route::post('/editor/{id}/save', [DashboardController::class, 'saveEditor'])->name('admin.editor.save');
});
