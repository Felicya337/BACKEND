<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CulturalController;
use App\Http\Controllers\EnsiklopediaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StorytellingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarketplaceController;


Route::apiResource('culturals', CulturalController::class);

Route::apiResource('ensiklopedia', EnsiklopediaController::class);

Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);
Route::get('/ensiklopedia/slug/{slug}', [EnsiklopediaController::class, 'showBySlug']);



Route::get('/storytelling/public', [StorytellingController::class, 'showPublic']); // untuk user umum
Route::get('/storytelling/admin', [StorytellingController::class, 'showAdmin']);   // untuk admin dashboard

Route::post('/storytelling', [StorytellingController::class, 'store']);     // create
Route::get('/storytelling/{id}', [StorytellingController::class, 'show']);  // show by id
Route::put('/storytelling/{id}', [StorytellingController::class, 'update']); // update
Route::delete('/storytelling/{id}', [StorytellingController::class, 'destroy']); // delete

Route::get('/marketplace', [MarketplaceController::class, 'allProducts']);


Route::post('/admin/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/admin/profile', function (Request $request) {
    return response()->json([
        'user' => $request->user()
    ]);
});

Route::prefix('penjual')->group(function () {
    Route::post('/register', [MarketplaceController::class, 'register']);   // registrasi penjual
    Route::post('/login', [MarketplaceController::class, 'login']);         // login penjual
    Route::put('/update/{id}', [MarketplaceController::class, 'updateProfile']); // update profil

    // CRUD produk
    Route::get('/{penjual_id}/produk', [MarketplaceController::class, 'myProducts']); // produk milik penjual
    Route::post('/produk', [MarketplaceController::class, 'store']);                  // tambah produk
    Route::put('/produk/{id}', [MarketplaceController::class, 'update']);             // edit produk
    Route::delete('/produk/{id}', [MarketplaceController::class, 'destroy']);         // hapus produk
});

