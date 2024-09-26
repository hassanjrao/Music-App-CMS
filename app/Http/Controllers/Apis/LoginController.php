<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request){

        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        if(!auth()->attempt($request->only("email","password"))){
            return response([
                "message"=>"Email or password is incorrect",
                'errors'=>[
                    'email'=>['Email or password is incorrect']
                ]
            ],401);
        }

        $user=User::where("email",$request->email)->firstOrFail();

        $token=$user->createToken("token")->plainTextToken;

        $user=ResourcesUser::make($user);

        return response([
            'message'=>'Successfully logged in',
            'token'=>$token,
            'user'=>$user
        ]);

    }


    public function register(Request $request){

        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:8"
        ]);

        $user=User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)
        ]);

        $user->assignRole("user");


        $token=$user->createToken("token")->plainTextToken;


        $user=ResourcesUser::make($user);

        return response([
            'message'=>'Successfully Registered',
            'token'=>$token,
            'user'=>$user
        ]);

    }


    public function forgotPassword(Request $request){

        $request->validate([
            "email"=>"required|email"
        ]);

        $user=User::where("email",$request->email)->first();

        if(!$user){
            return response([
                "message"=>"User not found",
                'errors'=>[
                    'email'=>['User not found']
                ]
            ],404);
        }

        $user->sendPasswordResetNotification($user->createToken("password_reset")->plainTextToken);

        return response([
            'message'=>'A password reset link has been sent to your email'
        ]);

    }

    public function settings(){
        $settings=Setting::first();

        $settings->working_days=json_decode($settings->working_days);

        return response([
            'data'=>[
                'settings'=>$settings
            ]
        ]);
    }


}
