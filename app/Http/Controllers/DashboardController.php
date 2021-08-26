<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
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
