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


//Film route-ok
Route::get('/films', [FilmController::class, 'index']);
Route::post('/films', [FilmController::class, 'store']);

//Customer route-ok
Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);

//Rental route-ok
Route::get('/rentals', [RentalController::class, 'index']);
Route::post('/rentals', [RentalController::class, 'store']);
Route::put('/rentals/{id}', [RentalController::class, 'update']);
Route::delete('/rentals/{id}', [RentalController::class, 'destroy']);