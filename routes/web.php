<?php

use App\Http\Controllers\MarketingPageController;
use App\Http\Controllers\RanulphLandingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RanulphLandingController::class, 'show'])->name('home');
Route::get('/search', SearchController::class)->name('search');
Route::get('/use-cases', [MarketingPageController::class, 'useCases'])->name('use-cases');
Route::get('/opinions', [MarketingPageController::class, 'opinions'])->name('opinions');
Route::get('/resources', [MarketingPageController::class, 'resources'])->name('resources');
Route::get('/company/about', [MarketingPageController::class, 'about'])->name('about');
Route::get('/security', [MarketingPageController::class, 'simple'])->defaults('page', 'security')->name('security');
Route::get('/company/contact', [MarketingPageController::class, 'simple'])->defaults('page', 'contact')->name('contact');
Route::get('/rss-feeds', [MarketingPageController::class, 'simple'])->defaults('page', 'rss-feeds')->name('rss-feeds');
Route::get('/privacy', [MarketingPageController::class, 'simple'])->defaults('page', 'privacy')->name('privacy');
Route::get('/terms', [MarketingPageController::class, 'simple'])->defaults('page', 'terms')->name('terms');
Route::post('/ranulph/enquiry', [RanulphLandingController::class, 'store'])->name('ranulph.enquiry');

Route::middleware(['auth', 'active_user'])->group(function () {
    Route::get('/dashboard', [PortalController::class, 'overview'])->name('dashboard');
    Route::get('/workspaces', [PortalController::class, 'workspaces'])->name('portal.workspaces');
    Route::get('/billing', [PortalController::class, 'billing'])->name('portal.billing');
    Route::get('/support', [PortalController::class, 'support'])->name('portal.support');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'active_user', 'super_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}/super-admin', [UserManagementController::class, 'updateSuperAdmin'])->name('users.super-admin');
    Route::patch('/users/{user}/verification', [UserManagementController::class, 'updateVerification'])->name('users.verification');
    Route::patch('/users/{user}/disabled', [UserManagementController::class, 'updateDisabled'])->name('users.disabled');
});

require __DIR__.'/auth.php';
