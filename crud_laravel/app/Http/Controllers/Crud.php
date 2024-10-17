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

        Student::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'dob' => $validatedData['dob'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // return "storing data";

        return response()->json([
            'message' => 'Student record added successfully!',
        ], 201);
    }
}
