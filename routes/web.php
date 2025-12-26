<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountSetupController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureProfileSetup;
use App\Http\Controllers\AnnouncementController;

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

    // Account Setup Routes
    Route::get('/setup', [AccountSetupController::class, 'create'])->name('account.setup.create');
    Route::post('/setup', [AccountSetupController::class, 'store'])->name('account.setup.store');

    Route::middleware([EnsureProfileSetup::class])->group(function () {

        // Dashboard (Accessible by admin, moderator, editor)
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/announcements', [AnnouncementController::class, 'indexAdmin'])->name('admin.announcements');
        Route::post('/announcements', [AnnouncementController::class, 'store'])->name('admin.announcements.store');
        Route::put('/announcements/{id}', [AnnouncementController::class, 'update'])->name('admin.announcements.update');
        Route::delete('/announcements/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcements.destroy');
        Route::get('/staff-page', [DashboardController::class, 'staffPage'])->name('admin.staff-page');
        Route::get('/editor/{id}', [DashboardController::class, 'editor'])->name('admin.editor');
        Route::post('/editor/{id}/save', [DashboardController::class, 'saveEditor'])->name('admin.editor.save');

        //new routes
        Route::post('/admin/update-user', [DashboardController::class, 'updateUser'])->name('admin.user.update');
        Route::get('/staff-preview', [DashboardController::class, 'publicStaffView'])->name('public.staff');

        // Landing Page Edit
        Route::get('/landing-page', [DashboardController::class, 'landingEdit'])->name('admin.landing-page');

        // Profile Management
        Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

        // Page Request Submission (for Editors)
        Route::post('/page-request', [DashboardController::class, 'storePageRequest'])->name('page_requests.store');
        Route::delete('/page-request/{id}', [DashboardController::class, 'destroyPageRequest'])
        ->name('page_requests.destroy');

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

            // Page Requests
            Route::post('/page-request/{id}/approve', [DashboardController::class, 'approveRequest'])->name('page_requests.approve');
            Route::post('/page-request/{id}/reject', [DashboardController::class, 'rejectRequest'])->name('page_requests.reject');
        });

        // ADMIN & MODERATOR ONLY
        Route::middleware(['role:admin,moderator'])->group(function () {
            // Page Creation
            Route::post('/pages/store', [DashboardController::class, 'store'])->name('pages.store');
        });

    });

});

// Redirect /admin to dashboard (will hit auth middleware if not logged in)
Route::redirect('/admin', '/admin/dashboard');

// Public Route
Route::get('/announcements', [AnnouncementController::class, 'indexPublic']);
