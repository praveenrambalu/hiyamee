<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function myProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('pages.profile.myprofile')->with('profile', $user);
    }
    public function myProfilePost(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phoneno = $request->phoneno;

        if ($request->password != null && $request->password != "" && $request->newpassword != null && $request->newpassword != "") {
            if (Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->newpassword);
            } else {
                return redirect()->back()->with('error', 'Password is wrong');
            }
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile Updated');
        // return view('pages.profile.myprofile')->with('profile', $user);
    }
}
