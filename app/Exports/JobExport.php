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

class JobExport implements FromCollection, WithHeadings
{
    use Exportable;
    public $id;
    /**
     * @return \Illuminate\Support\Collection
     */
    // use Exportable;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function collection()
    {

        // foreach ($companies as $company) {
        // }
        $data = [];
        $company = Company::find($this->id);
        $jobs = Job::where('status', 'active')->where('company_id', $company->id)->get();
        foreach ($jobs as $job) {
            $job_creator = User::find($job->created_by);
            $completedInterviews = Candidate::where('status', 'active')->where('job_id', $job->id)->where('interview_outcome', '!=', 'Ready')->get();
            $remainingInterviews = Candidate::where('status', 'active')->where('job_id', $job->id)->where('interview_outcome',  'Ready')->get();
            $rejectedInterviews = Candidate::where('status', 'active')->where('job_id', $job->id)->where('interview_outcome',  'Rejected')->get();
            $selectedInterviews = Candidate::where('status', 'active')->where('job_id', $job->id)->where('interview_outcome',  'Selected')->get();
            $totalCandidates = Candidate::where('status', 'active')->where('job_id', $job->id)->get();
            $localdata = array(
                'Company Name' => $company->company_name,
                'Industry' => $company->industry,
                'Company Description' => $company->description,
                'Company Location' => $company->location,
                'Website' => $company->website,
                'Phone' => $company->contactno,
                'Email' => $company->email,
                'Pincode' => $company->pincode,
                'Employement Type' => $job->employment_type,
                'Job Title' => $job->job_title,
                'Job Location' => $job->location,
                'Job Description' => $job->description,
                'Primary Skills' => $job->primary_skill,
                'Skills Required' => $job->skills_required,
                'Openings' => $job->how_many_hires,
                'Annual CTC' => $job->annual_ctc,
                'Total  Interviews' => count($totalCandidates),
                'Completed Interviews' => count($completedInterviews),
                'Remaining Interviews' => count($remainingInterviews),
                'Selected Interviews' => count($selectedInterviews),
                'Rejected Interviews' => count($rejectedInterviews),
                'Uploader Name' => $job_creator->name ?? '',
                'Uploader Email' => $job_creator->email ?? '',
                'Uploader Phone' => $job_creator->phoneno ?? '',


            );
            array_push($data, $localdata);
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Company Name',
            'Industry',
            'Company Description',
            'Company Location',
            'Website',
            'Phone',
            'Email',
            'Pincode',
            'Employement Type',
            'Job Title',
            'Job Location',
            'Job Description',
            'Primary Skills',
            'Skills Required',
            'Openings',
            'Annual CTC',
            'Total  Interviews',
            'Completed Interviews',
            'Remaining Interviews',
            'Selected Interviews',
            'Rejected Interviews',
            'Uploader Name',
            'Uploader Email',
            'Uploader Phone',
        ];
    }
}
