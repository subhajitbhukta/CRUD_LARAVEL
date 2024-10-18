<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function user(){
        return view('login');
    }
    public function show(Request $request){
        // die;
        $user = $request->user();
        return view('welcome', ['user' => $user]);
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
