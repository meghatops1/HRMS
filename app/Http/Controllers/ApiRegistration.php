<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiRegistration extends Controller
{
    function registration(Request $request ){
        $user = User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;
        return response()->json(['token' => $token], 200);


    }
    function login(Request $request){
        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }


    }
}
