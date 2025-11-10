<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnsiklopediController;
use App\Http\Controllers\Admin\StorytellingController;
use App\Http\Controllers\Admin\TokohController;

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login']);
    });

    // Authenticated
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        // CRUD Storytelling
        Route::resource('storytellings', StorytellingController::class);

        Route::resource('ensiklopedi',EnsiklopediController::class);

        Route::resource('tokohs', TokohController::class);
    });
});
