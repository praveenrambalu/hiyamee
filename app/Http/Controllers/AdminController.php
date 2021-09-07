<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyAssign;
use App\Models\User;
use App\Notifications\SubadminAssignNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function addAdmin()
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }

        return view('pages.subadmin.add');
    }
    public function addAdminPost(Request $request)
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
        $user->user_type = 'subadmin';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneno = $request->phoneno;
        $password = 'Admin_' . $user->name . '_' . rand(0, 999999);
        $password = str_replace(' ', '', $password);
        $hashed = Hash::make($password);
        $user->password = $hashed;
        $user->save();
        $user->notify(new SubadminAssignNotification($user->name, $user->email, $password));
        return redirect('/admin/assign/' . $user->id)->with('success', 'Admin added successfully');

        // return view('pages.companies.add');
    }

    public function assignCompanies(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        $companies = Company::where('status', 'active')->orderBy('company_name', 'asc')->get();
        return view('pages.subadmin.companies')->with('companies', $companies);
    }
    public function assignCompaniesPost(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }


        $companies = $request->company;
        if ($companies != "") {
            foreach ($companies as $company) {
                if ($dbcompany = Company::find($company)) {

                    if ($existtest = CompanyAssign::where('user_id', $id)->where('company_id', $company)->first()) {
                        $existtest->user_id = $id;
                        $existtest->company_id = $dbcompany->id;
                        $existtest->company_name = $dbcompany->company_name;
                        $existtest->industry = $dbcompany->industry;
                        $existtest->location = $dbcompany->location;
                        $existtest->status = 'active';
                        $existtest->save();
                    } else {
                        $assign = new CompanyAssign;
                        $assign->user_id = $id;
                        $assign->company_id = $dbcompany->id;
                        $assign->company_name = $dbcompany->company_name;
                        $assign->industry = $dbcompany->industry;
                        $assign->location = $dbcompany->location;
                        $assign->save();
                    }
                }
            }
            return redirect('/admin/view')->with('success', 'The companies allocated Successfully ');
        } else {
            return redirect()->back()->with('error', 'No Companies Selected ');
        }
    }


    public function viewAdmin()
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        $admins = User::where('user_type', 'subadmin')->where('status', 'active')->get();
        return view('pages.subadmin.view')->with('admins', $admins);
    }
    public function viewAdminDetail(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        if ($admin = User::where('user_type', 'subadmin')->where('id', $id)->where('status', 'active')->first()) {

            $companies = CompanyAssign::where('user_id', $admin->id)->where('status', 'active')->get();
            return view('pages.subadmin.detail')->with(['admin' => $admin, 'companies' => $companies]);
        } else {
            abort(404);
        }
    }
    public function deleteAssign(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }

        if ($company = CompanyAssign::where('id', $id)->where('status', 'active')->first()) {
            $company->status = 'inactive';
            $company->save();
            return redirect()->back()->with('success', 'Company Unassigned');
        } else {
            return redirect()->back()->with('error', 'Not Found');
        }
    }
}
