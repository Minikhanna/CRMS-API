<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AuthController extends Controller
{
    //
   
    public function signup(Request $request){
        $validateuser = FacadesValidator::make(
            $request->all(),
            [
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required',
            ]
            );
            if($validateuser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Validation Error',
                    'errors'=>$validateuser->errors()->all(),
                ],401);
            }
            
            $user = User::Create([
                'name' => $request ->name,
                'email'=> $request ->email,
                'password'=>$request ->password,
            ]);
            return response()->json([
                'status'=> true,
                'message'=>'User Created Successfully',
                'user'=>$user,
            ],200);
    }


    public function login(Request $request){

        $validateuser = FacadesValidator::make(
            $request->all(),
            [
                'email'=>'required|email',
                'password'=>'required',
            ]
            );
              if($validateuser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Authentication Fail',
                    'errors'=>$validateuser->errors()->all(),
                ],401);
            }
           
        if(Auth::attempt(['email'=> $request->email,'password'=>$request->password])){
            $authUser = Auth::user();
            return response()->json([
                'status'=> true,
                'message'=>'User Logged in Successfully',
                'token'=>$authUser->createToken("API Token")->plainTextToken,
                'token_type'=>'bearer'
            ],200);
        }else{
                return response()->json([
                    'status'=> false,
                    'message'=>'Email and Password does not matched', 
                ],404);

        }
    }
    public function logout(Request $request){
        $user = $request -> user();
        $user ->tokens()->delete();

        return response()->json([
            'status'=> true,
            'message'=>'You Logged out Successfully',
           'user'=>$user,
        ],200);
        
    }
}
