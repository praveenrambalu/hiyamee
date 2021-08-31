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
        } else {
            $company = Company::where('admin_id', Auth::user()->id)->first();
            $completedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome', '!=', 'Ready')->get();
            $remainingInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Ready')->get();
            $rejectedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Rejected')->get();
            $selectedInterviews = Candidate::where('allocated_to', Auth::user()->id)->where('interview_outcome',  'Selected')->get();
            $totalCandidates = Candidate::where('allocated_to', Auth::user()->id)->get();
        }


        $totalCompanies = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->get();
        $totalRecruiters = User::where('user_type', 'recruiter')->where('status', 'active')->get();
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'superadmin') {
            $latestCandidates = Candidate::orderBy('updated_at', 'desc')->paginate(5);
        } else {
            $latestCandidates = Candidate::where('allocated_to', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(5);
        }
        $Companies = Company::where('status', 'active')->orderBy('updated_at', 'desc')->paginate(5);
        $jobs = Job::where('status', 'active')->orderBy('updated_at', 'desc')->paginate(5);
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
            'jobs' => $jobs,
        ]);
    }
}
