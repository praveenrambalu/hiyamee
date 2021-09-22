<?php

namespace App\Exports;

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    // use Exportable;

    public function collection()
    {

        // foreach ($companies as $company) {
        // }
        $data = [];
        switch (Auth::user()->user_type) {
            case 'superadmin':
                $recruiters = User::where('user_type', 'recruiter')->where('status', 'active')->get();
                break;
            case 'admin':
                $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
                $recruiters = User::where('user_type', 'employee')->where('company_id', $company->id)->where('status', 'active')->get();
                break;

            default:
                # code...
                break;
        }
        foreach ($recruiters as $recruiter) {
            $completedInterviews = Candidate::where('status', 'active')->where('allocated_to', $recruiter->id)->where('interview_outcome', '!=', 'Ready')->get();
            $remainingInterviews = Candidate::where('status', 'active')->where('allocated_to', $recruiter->id)->where('interview_outcome',  'Ready')->get();
            $rejectedInterviews = Candidate::where('status', 'active')->where('allocated_to', $recruiter->id)->where('interview_outcome',  'Rejected')->get();
            $selectedInterviews = Candidate::where('status', 'active')->where('allocated_to', $recruiter->id)->where('interview_outcome',  'Selected')->get();
            $totalCandidates = Candidate::where('status', 'active')->where('allocated_to', $recruiter->id)->get();

            $localdata = array(
                'Name' => $recruiter->name,
                'Email' => $recruiter->email,
                'Phone No' => $recruiter->phoneno ?? '',
                'Status' => $recruiter->status,
                'Total Allocated Interviews' => count($totalCandidates),
                'Completed Interviews' => count($completedInterviews),
                'Remaining Interviews' => count($remainingInterviews),
                'Selected Interviews' => count($selectedInterviews),
                'Rejected Interviews' => count($rejectedInterviews),
            );
            array_push($data, $localdata);
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone No',
            'Status',
            'Total Allocated Interviews',
            'Completed Interviews',
            'Remaining Interviews',
            'Selected Interviews',
            'Rejected Interviews'
        ];
    }
}
