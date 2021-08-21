<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function addJob()
    {
        $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
        if ($company) {
            return view('pages.jobs.add')->with('company', $company);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
}
