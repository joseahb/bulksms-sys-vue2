<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
     public function register(Request $request)
        {
            $validatedData = $request->validate([
                'username' => 'required|unique:users|max:55',
                'first_name' => 'required|max:55',
                'last_name' => 'required|max:55',
                'mobile' => 'required|unique:users',
                'email' => 'email|required|unique:users',
                'password' => 'required|confirmed'
            ]);

            $validatedData['password'] = Hash::make($request->password);

            $user = User::create($validatedData);

            $accessToken = $user->createToken('authToken')->accessToken;

            return response(['message' => 'success'], 201);
        }

        public function login(Request $request)
        {
            $input = $request->validate([
                'userId' => 'required',
                'password' => 'required'
            ]);

            $fieldType = filter_var($input['userId'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            
            $loginData = array($fieldType => $input['userId'], 'password' => $input['password']);
            
            if (!auth()->attempt($loginData)) {
                return response(['message' => 'This User does not exist, check your details'], 400);
            }

            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            return response(['user' => auth()->user(), 'message'=>'success', 'status'=>'success', 'access_token' => $accessToken], 200);
        }
}
