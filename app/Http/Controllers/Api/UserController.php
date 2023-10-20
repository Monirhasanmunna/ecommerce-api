<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email'=> 'required|unique:users',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);


        if($validate->fails()){
            return response()->json([
                'status' => 404,
                'message'=> 'please input validate info',
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 200,
            'message'=> 'Registration Successfull',
            'user'   => $user
        ]);
    }


    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 404,
                'message'=> 'please input validate info',
            ]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken($user->email)->plainTextToken;

            return response()->json([
                'status' => 200,
                'message'=> 'Login Successfull',
                'token' => $token,
                'user'  => $user
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message'=> 'Invalide Credential',
            ]);
        }

    }
}
