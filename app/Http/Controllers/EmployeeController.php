<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Notifications\EmployeeAssignNotification;
use App\Notifications\RecruiterAssignNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function addEmployee()
    {
        if (Auth::user()->user_type != 'admin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        return view('pages.employees.add');
    }

    public function addEmployeePost(Request $request)
    {


        // return $request;
        if (Auth::user()->user_type != 'admin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }


        $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
        if ($company) {
            $existtest = User::where('email', $request->email)->first();
            if ($existtest) {
                return redirect()->back()->with('error', 'The user email already exist ! ');
            }
            $user = new User;
            $user->user_type = 'employee';
            $user->company_id = $company->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phoneno = $request->phoneno;
            $password = 'Employee' . $user->name . '_' . rand(0, 999999);
            $password = str_replace(' ', '', $password);
            $hashed = Hash::make($password);
            $user->password = $hashed;
            $user->save();
            $user->notify(new EmployeeAssignNotification($company->company_name, $company->location, $user->name, $user->email, $password));
            return redirect()->back()->with(['success' => 'Employee added successfully', 'redirect_url' => '/employees/view']);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }





        // return view('pages.companies.add');
    }

    public function viewEmployee()
    {
        if (Auth::user()->user_type != 'admin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }


        $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
        if ($company) {
            $employees = User::where('user_type', 'employee')->where('company_id', $company->id)->where('status', 'active')->get();
            return view('pages.employees.view')->with('employees', $employees);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }


    public function editEmployee(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type != 'admin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }

        if ($recruiter = User::where('user_type', 'employee')->where('id', $id)->first()) {
            return view('pages.employees.edit')->with('recruiter', $recruiter);
        } else {
            return redirect()->back()->with('error', 'Forbidden Access');
        }
    }
    public function editEmployeePost(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type != 'admin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }

        if ($recruiter = User::where('user_type', 'employee')->where('id', $id)->first()) {
            $recruiter->name = $request->name;
            $recruiter->phoneno = $request->phoneno;
            $recruiter->save();
            return redirect('/employees/view')->with('success', 'Employee Details Updated');
        } else {
            return redirect()->back()->with('error', 'Forbidden Access');
        }
    }
}
