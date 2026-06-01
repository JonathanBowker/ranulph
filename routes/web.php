<?php

use App\Http\Controllers\PortalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
