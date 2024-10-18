<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Crud;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/show', [Crud::class, 'getData']);
// Route::post('/register', [Crud::class, 'store']);
// Route::post('/login', [Crud::class, 'login']);
// Route::any('/logout',[Crud::class, 'logout']);
// Route::get('/login', [Crud::class, 'login'])->name('login');
// Route::put('/update', [Crud::class, 'update'])->name('api.update');

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [AuthController::class, 'logout']);
      Route::get('user', [AuthController::class, 'user']);
    });
});