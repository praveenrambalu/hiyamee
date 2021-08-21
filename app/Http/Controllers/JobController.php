<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
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
    public function addJobPost(Request $request)
    {
        $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
        if ($company) {
            $job = new Job;
            $job->company_id = $company->id;
            $job->employment_type = $request->employment_type;
            $job->job_title = $request->job_title;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->primary_skill = $request->primary_skill;
            $job->skills_required = $request->skills_required;
            $job->how_many_hires = $request->how_many_hires;
            $job->annual_ctc = $request->annual_ctc;
            $job->created_by = Auth::user()->id;
            $job->save();
            return redirect()->back()->with('success', 'Job Posted Successfully');
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
    public function viewJobs(Request $request)
    {
        $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
        if ($company) {
            $jobs = Job::where('company_id', $company->id)->where('status', 'active')->get();
            return view('pages.jobs.view')->with(['company' => $company, 'jobs' => $jobs]);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
}
