<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        return view('pages.dashboard');
    }

    public function profile(){
        return view('pages.profile');
    }

    public function login(){
        return view('pages.login');
    }

    public function signUp(){
        return view('pages.sign-up');
    }
}
