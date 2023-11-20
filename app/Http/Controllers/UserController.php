<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public  function register(Request $request){


        $validData =  $request->validate([

            'username' => 'required|unique:users',
            'password' => 'required',

        ]);


        $user = User::create([
           'username' => $validData['username'],
           'password' => $validData['password'],
        ]);
        $user->save();

        return response()->json(['message' => 'user created :D','user' => $user]);
    }


    public  function login(Request $request){


        $loginData =  $request->validate([

            'username' => 'required',
            'password' => 'required',

        ]);

        if (Auth::attempt($loginData)){
            $user = User::where('username', $request->get('username'))->first();

            $token = fake()->md5();

            $user->token = $token;
            $user->token_expires_at = time() + 120;
            $user->save();

            return response()->json(['message' => 'your login :D','token' => $token]);
        }else{
            return response()->json(['message' => 'your is not exist |^_^|']);
        }
    }

}
