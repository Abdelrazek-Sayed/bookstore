<?php

namespace App\Http\Controllers;

//use Dotenv\Validator;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class ApiAuthController extends Controller
{
     public function register(Request $request)
     {
         // validation
         $validator = Validator::make($request->all(),[
             'name'=>'required|string|max:255',
             'email'=>'required|email|max:255',
             'password'=>'required|string|min:5|max:25',
         ]);
         if($validator->fails()){
             $errors = $validator->errors();
             return response()->json($errors);
         // return Response::json($errors);
         }

// creation 
$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
]);

// create token 

    $token = $user->createToken('auth-token');

    $plainToken = $token->plainTextToken;

    return Response::json([
    'token'=> $plainToken,
    ]);
}
// {"token":"1|X1rGzavzdmzsFo6auIvEDeBWAmTxwenOyiEMs0bI"
}
