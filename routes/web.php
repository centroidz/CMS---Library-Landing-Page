<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Public Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Group
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard (Accessible by admin, moderator, editor)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/announcements', [DashboardController::class, 'announcementsIndex'])->name('admin.announcements');
    Route::get('/staff-page', [DashboardController::class, 'staffPage'])->name('admin.staff-page');
    Route::get('/editor/{id}', [DashboardController::class, 'editor'])->name('admin.editor');
    Route::post('/editor/{id}/save', [DashboardController::class, 'saveEditor'])->name('admin.editor.save');


    // Landing Page Edit
    Route::get('/landing-page', [DashboardController::class, 'landingEdit'])->name('admin.landing-page');

    // ADMIN ONLY
    Route::middleware(['role:admin'])->group(function () {
        // Page Deletion
        Route::delete('/pages/{id}', [DashboardController::class, 'destroy'])->name('pages.destroy');

        // User Management
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::put('/users/{user}/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        //staff management
        Route::get('/staff', [DashboardController::class, 'staffIndex'])->name('admin.staff');
    });

    // ADMIN & MODERATOR ONLY
    Route::middleware(['role:admin,moderator'])->group(function () {
        // Page Creation
        Route::post('/pages/store', [DashboardController::class, 'store'])->name('pages.store');
    });
});

// Redirect /admin to dashboard (will hit auth middleware if not logged in)
Route::redirect('/admin', '/admin/dashboard');
