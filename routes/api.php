<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RentalController;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/films', [FilmController::class, 'index']);
Route::post('/films', [FilmController::class, 'store']);

Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);

Route::get('/rentals', [RentalController::class, 'index']);
Route::post('/rentals', [RentalController::class, 'store']);
Route::put('/rentals', [RentalController::class, 'update']);
Route::delete('/rentals', [RentalController::class, 'destroy']);