<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Authcontroller extends Controller
{
    public function registerpage()
    {
        return view('pages.register');
    }
    public function register(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',

            ]
        );
        $register = new User();
        $register->name = $request->username;
        $register->email = $request->email;
        $register->password = $request->password;
        $register->role = 2;
        $register->save();

        $profile = new UserProfile;
        $profile->user_id = $register->id;
        $profile->full_name = $request->username;
        $profile->save();

        return view('pages.login');
    }
    public function loginpage()
    {
        return view('pages.login');
    }
    public function login(Request $request)
    {


        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // dd($credentials);
            $user = Auth::user();
            if ($user->role == 2) {
                return redirect()->route('card');
            } else {
               
                return redirect()->route('layout');
            }
        } else {
            return redirect()->route('login')->withErrors(['login' => 'Your credential is invalid']);
        }
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
            'newpassword' => 'required|min:6',
            'renewpassword' => 'required|min:6|same:newpassword',
        ]);
        $user = Auth::user();
        $register = User::where('id', Auth::user()->id)->firstOrFail();
        // dd( $register);

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Current password is incorrect.']);
        }
        if (Hash::check($request->newpassword, $user->password)) {
            return back()->withErrors(['newpassword' => 'New password must be different from the current password.']);
        }
        $register->password = Hash::make($request->newpassword);
        $register->save();
        return redirect()->route('edit')->with('status', 'Password changed successfully!');
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login-view');
    }
}
