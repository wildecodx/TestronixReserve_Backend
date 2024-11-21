<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Reservations
Route::get('dashboard', [AdminController::class, 'index']);
Route::post('dashboard', [AdminController::class, 'store']);
Route::get('dashboard/{id}', [AdminController::class, 'show']);
Route::put('dashboard/{id}', [AdminController::class, 'update']);
Route::delete('dashboard/{id}', [AdminController::class, 'destroy']);
Route::post('/reservation',  [CustomerController::class, 'store']);
//  Rooms
Route::post('/addRoom', [AdminController::class, 'addRoom']);
Route::put('/updateRoom/{id}', [AdminController::class, 'updateRoom']);
Route::delete('/deleteRoom/{id}', [AdminController::class, 'deleteRoom']);
Route::post('logout', [AuthController::class, 'logout']);

Route::get('/room', [AdminController::class, 'displayRoom']);

// Authentication
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});


Route::middleware(['auth:api'])->group(function () {});
