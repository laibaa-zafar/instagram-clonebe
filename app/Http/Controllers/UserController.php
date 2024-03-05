<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function signup(Request $req)
    {
        $validatedData = $req->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = new User;
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();
    
        return $user;
    }
    function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();
    
        if (!$user || !Hash::check($req->password, $user->password))
        {
            return response()->json(['error' => 'Email or password is incorrect'], 401);
        }
        return $user;
        
    }
}
