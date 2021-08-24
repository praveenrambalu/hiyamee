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
        return view('pages.companies.add');
    }
    public function addCompanyPost(Request $request)
    {
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
        // return $request;
        $company = Company::where('id', $id)->where('status', 'active')->first();
        if ($company) {
            if ($company->admin_id == NULL) {
                $existtest = User::where('email', $request->email)->first();
                if ($existtest) {
                    return redirect()->back()->with('Error', 'The user email already exist ! ');
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
                return redirect('/companies')->with('success', 'Admin added successfully');
            } else {
                return redirect('/companies')->with('error', 'Company admin already assigned');
            }
        } else {
            return redirect('/companies')->with('error', 'Company not found');
        }

        // return view('pages.companies.add');
    }
    public function viewCompanies()
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        $companies = Company::where('status', 'active')->get();
        return view('pages.companies.view')->with('companies', $companies);
    }
}
