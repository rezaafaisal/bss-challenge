<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function dashboard(){
        return view('pages.dashboard');
    }

    public function profile(){
        $data = User::find(Auth::id());
        return view('pages.profile', [
            'user' => $data
        ]);
    }

    public function changePhoto(Request $request){
        // return $request;
        $request->validate([
            'id' => ['required'],
            'image' => ['required', 'extensions:jpg,png,jpeg']
        ]);

        try {
            $user = User::find($request->id);

            // of exist then remove old photo
            if($user->image !== 'user.jpg'){
                Storage::delete('photo/'.$user->image);
            }
            
            $image = $request->image;
            $image_name = Carbon::now()->format('YmdHis').'.'.$image->extension();
            Storage::putFileAs('photo', $image, $image_name);
            
            $user->image = $image_name;
            $user->save();
            return back()->with('success', 'Profile image was updated!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request){
        $request->validate([
            'id' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed', 'min:4']
        ]);

        try {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;

            if($request->password !== null){
                $user->password = $request->password;
            }

            $user->save();

            return back()->with('success', 'Profile was updated!');
            
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            
        }
    }

    public function login(){
        return view('pages.login');
    }

    public function signUp(){
        return view('pages.sign-up');
    }
}
