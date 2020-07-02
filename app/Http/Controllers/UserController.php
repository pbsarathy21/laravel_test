<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createUser(Request $request) {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        return response([
            "success" => true,
            "message" => "user created successfully",
            "user" => $user
        ]);
    }

    public function login(Request $request) {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $access_token = Auth::user()->createToken('authToken')->accessToken;

            return response([
                "succes" => true,
                "message" => "Login successful",
                "access_token" => $access_token
            ]);

        } else {
            return response([
                "success" => false,
                "message" => "invalid credentials"
            ]);
        }
    }
}
