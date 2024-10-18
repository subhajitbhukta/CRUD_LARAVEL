<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;


Route::get('/',[userController::class,'user']);
Route::get('/register',[userController::class,'register'])->name('registration');
Route::get('/update',[userController::class,'update'])->name('update');
Route::post('/register',[userController::class,'disp'])->name("register");

Route::get('/welcome',[userController::class,'show'])->middleware("auth:sanctum");
// Route::get('/welcome', [userController::class, 'show']);