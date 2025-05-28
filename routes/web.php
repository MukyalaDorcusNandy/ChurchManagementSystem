<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
// use App\Http\Middleware\IsLeader;
use App\Http\Middleware\IsMember;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminMemberController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminMinistryController;
use App\Http\Controllers\Admin\AdminAnnouncementController;

use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SupportController;

use App\Http\Controllers\UserMinistryController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\UserAnnouncementController;
use App\Http\Controllers\UserFeedbackController;
use App\Http\Controllers\UserResourceController;





/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});



Route::view('/groups', 'groups.index')->name('groups.index');

// Home page
Route::get('/Users', [UserController::class, 'index'])->name('Users.index');

// Registration
Route::get('/Users/register', [UserController::class, 'register'])->name('Users.register');
Route::post('/Users', [UserController::class, 'store'])->name('Users.store');

// Login & Logout
Route::get('/Users/login', [UserController::class, 'showLoginForm'])->name('Users.login');
Route::post('/Users/login', [UserController::class, 'login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Member Routes (Authenticated Regular Users)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/Users/dashboard', [UserController::class, 'dashboard'])->name('Users.dashboard');
});



Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    // Ministries index - show ministries user has joined + available ones
    Route::get('Users/ministries', [UserMinistryController::class, 'index'])->name('ministries.index');

    // Request to join a ministry
    Route::post('/ministries/{ministry}/join', [UserMinistryController::class, 'join'])->name('ministries.join');
});


Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    // Events
    Route::get('/events', [UserEventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [UserEventController::class, 'show'])->name('events.show');
    Route::post('/events/{event}/join', [UserEventController::class, 'join'])->name('events.join');
    Route::delete('/events/{event}/cancel', [UserEventController::class, 'cancel'])->name('events.cancel');

    // Profile
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});


Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/announcements', [UserAnnouncementController::class, 'index'])->name('announcements.index');
    // Add other user announcements routes if needed
});


Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('feedback/create', [UserFeedbackController::class, 'create'])->name('feedback.create');
    Route::post('feedback', [UserFeedbackController::class, 'store'])->name('feedback.store');
});


Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    // Other user routes...

    // User resources index
    Route::get('/resources', [UserResourceController::class, 'index'])->name('resources.index');
});



/*
|--------------------------------------------------------------------------
| Admin Routes (Authenticated Admins Only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard & Notifications
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications');

    // Member Management
    Route::get('/members', [AdminMemberController::class, 'index'])->name('members.index');
    Route::put('/members/{member}', [AdminMemberController::class, 'update'])->name('members.update');
    Route::delete('/members/{member}', [AdminMemberController::class, 'destroy'])->name('members.destroy');

    // Reports, Settings, Support, Content
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/support', [SupportController::class, 'index'])->name('support.index');
    Route::get('/content', [ContentController::class, 'index'])->name('content.index');

    // Announcements (Admin only)
    Route::resource('/announcements', AdminAnnouncementController::class)->names([
        'index' => 'announcements.index',
        'create' => 'announcements.create',
        'store' => 'announcements.store',
        'edit' => 'announcements.edit',
        'update' => 'announcements.update',
        'destroy' => 'announcements.destroy',
    ]);
});


/*
|--------------------------------------------------------------------------
| Shared Authenticated Routes (Leaders/Admins/Members)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Ministries
    Route::resource('/ministries', AdminMinistryController::class)->names([
        'index' => 'ministries.index',
        'create' => 'ministries.create',
        'store' => 'ministries.store',
        'edit' => 'ministries.edit',
        'update' => 'ministries.update',
        'destroy' => 'ministries.destroy',
    ]);

    // Events
    Route::resource('/events', AdminEventController::class)->names([
        'index' => 'events.index',
        'create' => 'events.create',
        'store' => 'events.store',
        'edit' => 'events.edit',
        'update' => 'events.update',
        'destroy' => 'events.destroy',
    ]);
});
