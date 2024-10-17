<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class Crud extends Controller
{
    public function getData()
    {
        return "This is for getting data";
    }

    // Register API
    public function store(Request $request)
    {
        $validatedData=$request;
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'phone' => 'required|numeric|digits:10',
        //     'email' => 'required|email|unique:students,email',
        //     'address' => 'required|string|max:500',
        //     'gender' => 'required|in:m,f,o',
        //     'dob' => 'required|date|before:today',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);


        $student=Student::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'dob' => $validatedData['dob'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $student->createToken('crud_laravel')->plainTextToken;
        $cookie = cookie('auth_token', $token, 60 * 24);

        return redirect('/welcome')
        ->with('success', 'Student registered successfully!')
        ->cookie($cookie);
    }

    // Login API
    public function login(Request $req){
        
        $std=Student::where('email',$req->email)->first();

        if(!$std || !Hash::check($req->password, $std->password)){

            return redirect('/')->withErrors([
                'message' => 'Email or Password is invalid!'
            ]);

        }
        $token = $std->createToken('crud_laravel')->plainTextToken;
        $cookie = cookie('auth_token', $token, 60 * 24);
        
        return redirect('/welcome')->cookie($cookie);
    }

    // Log Out
    public function logout(Request $request)
    {
        $cookie = \Cookie::forget('auth_token');
        return redirect('/')->withCookie($cookie);
    }

    // Update
    public function update(Request $request){
        // 
    }
    
}
