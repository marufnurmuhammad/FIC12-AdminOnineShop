<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|unique:users|max:100',
            'password' => 'required',
        ]);
        //password hash
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'acces_token' => $token,
            'user' => $user,
        ], 201);
    }

    //logout
    public function logout(Request $request)
    {
       $request->user()->currentAccessToken()->delete();

       return response()->json([
        'message' => 'Logout successfully'
        ], 200);
    }

    //login
    public function login(Request $request)
    {
            $validated = $request->validate([
                'email' => 'required|max:100',
                'password' => 'required',
            ]);

            $user = User::where('email', $validated['email'])->first();
            if (!$user){
                return response()->json([
                    'message' => 'User Not Found',
                ], 401);
            }
            if(!Hash::check($validated['password'], $user->password)){
                return response()->json([
                    'message' => 'Invalid Password',
                ], 401);
            }

            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'acces_token' => $token,
                'user' => $user,
            ], 200);

        }
    }