<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\RecruiterAssignNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RecruiterController extends Controller
{
    public function addRecruiter()
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        return view('pages.recruiter.add');
    }
    public function addRecruiterPost(Request $request)
    {
        // return $request;
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        $existtest = User::where('email', $request->email)->first();
        if ($existtest) {
            return redirect()->back()->with('Error', 'The user email already exist ! ');
        }
        $user = new User;
        $user->user_type = 'recruiter';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneno = $request->phoneno;
        $password = 'Recruiter_' . $user->name . '_' . rand(0, 999999);
        $password = str_replace(' ', '', $password);
        $hashed = Hash::make($password);
        $user->password = $hashed;
        $user->save();
        $user->notify(new RecruiterAssignNotification($user->name, $user->email, $password));
        return redirect('/recruiter')->with('success', 'Recruiter added successfully');

        // return view('pages.companies.add');
    }
    public function viewRecruiter()
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        $recruiters = User::where('user_type', 'recruiter')->where('status', 'active')->get();
        return view('pages.recruiter.view')->with('recruiters', $recruiters);
    }
}
