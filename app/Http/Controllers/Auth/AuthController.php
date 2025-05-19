<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registration(RegistrationRequest $request)
    {
//        dd($request->validated());
        $user=User::create($request->validated());
        if($user){
            return response()->json([
                'success'=>true,
                'email'=>$user->email,
                'gender'=>$user->gender,
                'token'=>$user->createToken('api-token')->plainTextToken,
            ],201);
        }
        return response()->json([
            'success'=>false,
            'message'=>'Something went wrong',
        ]);
    }

    public function login(LoginRequest $request)
    {
        if(auth()->attempt($request->validated())){
            $user=auth()->user();
            return response()->json([
                'success'=>true,
                'email'=>$user->email,
                'gender'=>$user->gender,
                'token'=>$user->createToken('api-token')->plainTextToken,
            ],201);
        }
        return response()->json([
            'success'=>false,
            'message'=>'Something went wrong',
        ]);
    }

    public function profile()
    {
        if(auth()->check()){
            $user=auth()->user();
            return response()->json([
                'success'=>true,
                'email'=>$user->email,
                'gender'=>$user->gender,
            ],201);
        }
        return response()->json([
            'success'=>false,
            'message'=>'Something went wrong',
        ]);
    }
}
