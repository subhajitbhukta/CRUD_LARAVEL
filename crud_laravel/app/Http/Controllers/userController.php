<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function user(){
        return view('login');
    }
    public function show(Request $request){
        return view('welcome');    
    }
    public function register(){
        return view('registration');
    }
    public function update(){
        return view('update');
    }
    public function disp(Request $req){
        return $req;
    }
}
