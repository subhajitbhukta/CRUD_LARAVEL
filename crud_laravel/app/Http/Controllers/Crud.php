<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class Crud extends Controller
{
    public function getData()
    {
        return "This is for getting data";
    }

    // Register API
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:500',
            'gender' => 'required|in:m,f,o',
            'dob' => 'required|date|before:today',
            'password' => 'required|string|min:8|confirmed',
        ]);

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

        return response()->json([
            'message' => 'Student record added successfully!',
            'token' => $token,
        ], 201);
    }

    // Login API
    public function login(Request $req){
        $std=Student::where('email',$req->email)->first();

        if(!$std || !Hash::check($req->password, $std->password)){

            return response()->json([
                'message' => 'Email or Password is invalid!',
            ], 400);

        }
        // return $std;
        $token = $std->createToken('crud_laravel')->plainTextToken;
        return response()->json([
            'message' => 'Login successful!',
            'token' => $token,
        ], 201);
    }
}
