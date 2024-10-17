<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/',[userController::class,'user']);
Route::get('/welcome',[userController::class,'show'])->name('home');
Route::get('/register',[userController::class,'register'])->name('registration');
Route::get('/update',[userController::class,'update'])->name('update');