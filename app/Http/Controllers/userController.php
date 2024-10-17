<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function user(){
        return view('login');
    }
    public function show(){
        return view('welcome');
    }
    public function register(){
        return view('registration');
    }
    public function update(){
        return view('update');
    }
}
