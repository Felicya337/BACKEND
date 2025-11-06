<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CulturalController;
use App\Http\Controllers\EnsiklopediController;
use App\Http\Controllers\KategoriController;

Route::apiResource('culturals', CulturalController::class);
Route::apiResource('ensiklopedi', EnsiklopediController::class);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);
