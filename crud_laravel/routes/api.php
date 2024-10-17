<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Crud;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/show', [Crud::class, 'getData']);
Route::post('/register', [Crud::class, 'store']);
Route::post('/login', [Crud::class, 'login']);
Route::any('/logout',[Crud::class, 'logout']);
Route::get('/login', [Crud::class, 'login'])->name('login');