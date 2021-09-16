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
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type != 'subadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        return view('pages.recruiter.add');
    }
    public function addRecruiterPost(Request $request)
    {
        // return $request;
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type != 'subadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        $existtest = User::where('email', $request->email)->first();
        if ($existtest) {
            return redirect()->back()->with('error', 'The user email already exist ! ');
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
        return redirect()->back()->with(['success' => 'Recruiter added Successfully ', 'redirect_url' => '/recruiter/view']);
        // return view('pages.companies.add');
    }
    public function viewRecruiter()
    {
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type != 'subadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        $recruiters = User::where('user_type', 'recruiter')->where('status', 'active')->get();
        return view('pages.recruiter.view')->with('recruiters', $recruiters);
    }
    public function editRecruiter(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type != 'subadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }

        if ($recruiter = User::where('user_type', 'recruiter')->where('id', $id)->first()) {
            return view('pages.recruiter.edit')->with('recruiter', $recruiter);
        } else {
            return redirect()->back()->with('error', 'Forbidden Access');
        }
    }
    public function editRecruiterPost(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type != 'subadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }

        if ($recruiter = User::where('user_type', 'recruiter')->where('id', $id)->first()) {
            $recruiter->name = $request->name;
            $recruiter->phoneno = $request->phoneno;
            $recruiter->save();
            return redirect('/recruiter/view')->with('success', 'Recruiter Details Updated');
        } else {
            return redirect()->back()->with('error', 'Forbidden Access');
        }
    }
}
