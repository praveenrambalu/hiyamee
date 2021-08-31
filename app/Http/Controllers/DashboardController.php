<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {

        if (Auth::user()->user_type == 'superadmin') {
            $completedInterviews = Candidate::where('interview_outcome', '!=', 'Ready')->get();
            $remainingInterviews = Candidate::where('interview_outcome',  'Ready')->get();
            $rejectedInterviews = Candidate::where('interview_outcome',  'Rejected')->get();
            $selectedInterviews = Candidate::where('interview_outcome',  'Selected')->get();
            $totalCandidates = Candidate::all();
            $totalCompanies = Company::where('status', 'active')->get();
            $totalRecruiters = User::where('user_type', 'recruiter')->where('status', 'active')->get();
            $latestCandidates = Candidate::orderBy('updated_at', 'desc')->paginate(5);
            $Companies = Company::where('status', 'active')->orderBy('updated_at', 'desc')->paginate(5);
            $jobs = Job::where('status', 'active')->orderBy('updated_at', 'desc')->paginate(5);
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
            $completedInterviews = Candidate::where('company_id', $company->id)->where('interview_outcome', '!=', 'Ready')->get();
            $remainingInterviews = Candidate::where('company_id', $company->id)->where('interview_outcome',  'Ready')->get();
            $rejectedInterviews = Candidate::where('company_id', $company->id)->where('interview_outcome',  'Rejected')->get();
            $selectedInterviews = Candidate::where('company_id', $company->id)->where('interview_outcome',  'Selected')->get();
            $totalCandidates = Candidate::where('company_id', $company->id)->get();;
            $totalCompanies = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->get();
            $totalRecruiters = User::where('user_type', 'employee')->where('company_id', $company->id)->where('status', 'active')->get();
            $latestCandidates = Candidate::where('company_id', $company->id)->orderBy('updated_at', 'desc')->paginate(5);
            $Companies = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->paginate(5);
            $jobs = Job::where('company_id', $company->id)->where('status', 'active')->orderBy('updated_at', 'desc')->paginate(5);
        } else if (Auth::user()->user_type == 'employee') {
            $company = Company::where('id', Auth::user()->company_id)->where('status', 'active')->first();

            $completedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome', '!=', 'Ready')->get();
            $remainingInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Ready')->get();
            $rejectedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Rejected')->get();
            $selectedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Selected')->get();
            $totalCandidates = Candidate::where('allocated_to', Auth::user()->id)->get();

            $totalCompanies = Company::where('id', Auth::user()->company_id)->where('status', 'active')->get();

            $totalRecruiters = User::where('user_type', 'employee')->where('company_id', $company->id)->where('status', 'active')->get();
            $latestCandidates = Candidate::where('allocated_to', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(5);
            $Companies = Company::where('id', $company->id)->where('status', 'active')->paginate(5);
            $jobs = Job::where('company_id', $company->id)->where('status', 'active')->orderBy('updated_at', 'desc')->paginate(5);
        } else if (Auth::user()->user_type == 'recruiter') {
            $company = 0;

            $completedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome', '!=', 'Ready')->get();
            $remainingInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Ready')->get();
            $rejectedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Rejected')->get();
            $selectedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Selected')->get();
            $totalCandidates = Candidate::where('allocated_to', Auth::user()->id)->get();

            $totalCompanies = 0;
            $totalRecruiters = 0;

            $latestCandidates = Candidate::where('allocated_to', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(5);
            $Companies = 0;
            $jobs = 0;
        }


        return view('pages.superadmin.dashboard')->with([
            'completedInterviews' => $completedInterviews,
            'remainingInterviews' => $remainingInterviews,
            'totalCandidates' => $totalCandidates,
            'totalCompanies' => $totalCompanies,
            'totalRecruiters' => $totalRecruiters,
            'rejectedInterviews' => $rejectedInterviews,
            'selectedInterviews' => $selectedInterviews,
            'latestCandidates' => $latestCandidates,
            'Companies' => $Companies,
            'latestjobs' => $jobs,
        ]);
    }
}
