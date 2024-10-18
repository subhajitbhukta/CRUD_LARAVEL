<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Validator;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $validatedData=$request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:500',
            'gender' => 'required|in:m,f,o',
            'dob' => 'required|date|before:today',
            'password' => 'required|string|min:8',
        ]);

        // $student = new Student([
        //     'name'  => $request->name,
        //     'phone' => $request->phone,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'gender' => $request->gender,
        //     'dob' => $request->dob,
        //     'password' => bcrypt($request->password),
        // ]);

        // if($student->save()){
        //     $tokenResult = $student->createToken('Personal Access Token');
        //     $token = $tokenResult->plainTextToken;

        //     return response()->json([
        //     'message' => 'Successfully created user!',
        //     'accessToken'=> $token,
        //     ],201);
        // }
        // else{
        //     return response()->json(['error'=>'Provide proper details']);
        // }

        $student=Student::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'gender' => $validatedData['gender'],
            'dob' => $validatedData['dob'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $tokenResult = $student->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'message' => 'Successfully created user!',
            'accessToken'=> $token,
            ],201);
        // return redirect('/welcome');

    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email','password']);
        if(!Auth::guard('student')->attempt($credentials))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ],401);
        }

        // $user = $request->user();
        $student = Auth::guard('student')->user();
        $tokenResult = $student->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
        'accessToken' =>$token,
        'token_type' => 'Bearer',
        ]);

        // return redirect('/welcome');
    }

    // Get User API
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
        'message' => 'Successfully logged out'
        ]);

    }
}
