<?php

// controller to register or login using passport 

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //


public function register(request $request){

    $validatedData = $request->validate([

        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        // 'c_password' => 'required|same:password',
    ]);

    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);
    $token =  $user->createToken('Mytoken')->accessToken;

    return response(['message'=>'user registered sucessfully' , 'user'=>$user , 'access_token' => $token]);


}

public function login( request $request){

    $validatedData = $request->validate([

        
        'email' => 'required|',
        'password' => 'required',
     
    ]);


    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

        $user = Auth::user(); 

        $token =  $user->createToken('Mytoken')->accessToken;

        return response([ 'message'=>'user login sucessfully' , 'user'=>$user , 'access_token' => $token]);
    } 
    else{ 
        return "some error";
    } 


}




}
