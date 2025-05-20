<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Porfilecontroller extends Controller
{
    // public function store(Request $request){
    //     $user = new User;
    //     $request->validate(
    //         [
    //             'username' => 'required|string',
    //             'email' => 'required|email|unique:users',
    //             'password' => 'required|min:6',


    //         ]);
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password =$request->password;
    //         $user->save();
          

    
    // }
    public function userdetail(){
        $user=UserProfile::find(Auth::user()->id);
        // dd($user);
        return view('pages.edit',compact('user'));
    }

    public function users(){
        $user=UserProfile::find(Auth::user()->id);
        return view('layouts.default', compact('user'));
    }

    public function update(Request $request){
       
        $user = UserProfile::where('id',Auth::user()->id)->firstOrFail();
        $request->validate(
            [
                'fullName' => 'required|string',
                'about'=>'required|string',
                'company'=>'required|string',
                'job'=>'required|string',
                'country'=>'required|string',
                'address' => 'required|string',
                'phone'=>'required|regex:/^[0-9]{10}$/',
                'email' => 'required|email',
                'twitter'=>'required|string',
                'instagram'=>'required|string',
                'facebook'=>'required|string',
                'linkedin'=>'required|string',
                 'profile_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:5120',
            ]);

            if ($request->hasFile('profile_image')) {
                $folder = 'user/';
                $imageName =Auth::user()->name . '.' . $request->profile_image->getClientOriginalExtension();
                $request->profile_image->move(public_path($folder), $imageName);
                $user->profile_image = $imageName;
            }
            $user->full_name = $request->fullName;
            $user->about=$request->about;
            $user->company=$request->company;
            $user->job=$request->job;
            $user->country=$request->country;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->twitter_profile = $request->twitter;
            $user->facebook_profile = $request->facebook;
            $user->instagram_profile = $request->instagram;
            $user->linkedin_profile = $request->linkedin;
       
            // dd($request->job);  
            $user->save();
            return redirect()->route('edit');
            // return view('pages.edit');
    }
    
}
