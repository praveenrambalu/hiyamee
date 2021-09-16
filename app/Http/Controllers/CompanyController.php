<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Notifications\AdminAssignNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function addCompany()
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        return view('pages.companies.add');
    }
    public function addCompanyPost(Request $request)
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        // return $request;
        $company = new Company;
        $company->company_name = $request->company_name;
        $company->industry = $request->industry;
        $company->description = $request->description;
        $company->location = $request->location;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->contactno = $request->contactno;
        $company->pincode = $request->pincode;

        if ($logo = $request->logo) {
            $filenameWithExt = $logo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $logo->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $logo->storeAs('public/logo/', $fileNameToStore);
            $storagename = '/storage/logo/' . $fileNameToStore;
            $company->logo = $storagename;
        }

        $company->save();

        return redirect('/companies/' . $company->id . '/add-admin');
        // return view('pages.companies.add');
    }
    public function addCompanyAdmin(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        // return $request;
        $company = Company::where('id', $id)->where('status', 'active')->first();
        if ($company) {
            if ($company->admin_id == NULL) {
                return view('pages.companies.add-admin')->with('company', $company);
            } else {
                return redirect('/companies')->with('error', 'Company admin already assigned');
            }
        } else {
            return redirect('/companies')->with('error', 'Company not found');
        }

        // return view('pages.companies.add');
    }
    public function addCompanyAdminPost(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        // return $request;
        $company = Company::where('id', $id)->where('status', 'active')->first();
        if ($company) {
            if ($company->admin_id == NULL) {
                $existtest = User::where('email', $request->email)->first();
                if ($existtest) {
                    return redirect()->back()->with('error', 'The user email already exist ! ');
                }
                $user = new User;
                $user->user_type = 'admin';
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phoneno = $request->phoneno;
                $password = $company->company_name . '_' . $user->name . '_' . rand(0, 999999);
                $password = str_replace(' ', '', $password);
                $hashed = Hash::make($password);
                $user->password = $hashed;
                $user->save();
                $user->notify(new AdminAssignNotification($company->company_name, $company->location, $user->name, $user->email, $password));
                $company->admin_id = $user->id;
                $company->save();
                return redirect()->back()->with(['success' => 'Admin added Successfully ', 'redirect_url' => '/companies']);
            } else {
                return redirect('/companies')->with('error', 'Company admin already assigned');
            }
        } else {
            return redirect('/companies/view')->with('error', 'Company not found');
        }

        // return view('pages.companies.add');
    }
    public function viewCompanies()
    {
        // return Auth::user()->user_type;
        if (Auth::user()->user_type != 'recruiter' &&  Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type != 'subadmin') {
            abort(401);
        }

        $companies = Company::where('status', 'active')->get();
        return view('pages.companies.view')->with('companies', $companies);
    }
    public function editCompany(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        $company = Company::findOrFail($id);
        if ($admin = User::find($company->admin_id)) {
            return view('pages.companies.edit')->with(['company' => $company, 'admin' => $admin]);
        } else {
            return redirect('/companies/' . $company->id . '/add-admin')->with('error', 'Please Add the admin to the company');
        }
    }
    public function editCompanyPost(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        // return $request;
        $company = Company::findOrFail($id);
        $company->company_name = $request->company_name;
        $company->industry = $request->industry;
        $company->description = $request->description;
        $company->location = $request->location;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->contactno = $request->contactno;
        $company->pincode = $request->pincode;

        if ($logo = $request->logo) {
            $filenameWithExt = $logo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $logo->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $logo->storeAs('public/logo/', $fileNameToStore);
            $storagename = '/storage/logo/' . $fileNameToStore;
            $company->logo = $storagename;
        }

        $company->save();

        return redirect('/companies/view')->with('success', 'Edited Successfully');
        // return view('pages.companies.add');
    }
    public function editCompanyAdminPost(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        // return $request;
        $company = Company::findOrFail($id);
        $user = User::findOrFail($company->admin_id);
        $user->name = $request->name;
        $user->phoneno = $request->phoneno;
        $user->save();

        return redirect('/companies/view')->with('success', 'Edited Successfully');
        // return view('pages.companies.add');
    }
}
