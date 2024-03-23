<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

 
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
 
            return to_route('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    public function signUp(Request $request){
        $request->validate([
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4', 'confirmed']
        ]);

        try {
            $user = new User();
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            return to_route('login')->with('success', 'Hello '.$user->name.', Please login with your credential');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
