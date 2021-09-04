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

class CandidateExport implements FromCollection, WithHeadings
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
                $candidates = Candidate::all();
                break;
            case 'admin':
                if ($company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first()) {
                    $candidates = Candidate::where('company_id', $company->id)->get();
                } else {
                    $candidates = Candidate::where('allocated_to', Auth::user()->id)->get();
                }
                break;

            default:
                $candidates = Candidate::where('allocated_to', Auth::user()->id)->get();
                break;
        }
        foreach ($candidates as $candidate) {
            $job = Job::where('status', 'active')->where('id', $candidate->job_id)->first();
            $company = Company::find($job->company_id);
            $job_creator = User::find($job->created_by);
            $candidate_creator = User::find($candidate->uploaded_by);
            $last_updated = User::find($candidate->updated_by);
            if ($candidate->interviewer_id != NULL) {
                $interviewer = User::find($candidate->interviewer_id);
            } else {
                $interviewer = [];
            }


            $localdata = array(
                'Application ID' => $candidate->id,
                'Candidate Name' => $candidate->candidate_name,
                'Candidate Email' => $candidate->candidate_email,
                'Candidate Phone' => $candidate->candidate_phone,
                'Job' => $job->job_title,
                'Company' => $company->company_name,
                'Candidate DOB' => $candidate->dateofbirth,
                'PAN Card' => $candidate->pancard ?? '',
                'Gender' => $candidate->gender ?? '',
                'Experience' => $candidate->experience ?? '',
                'Relevent Experience' => $candidate->relexperience ?? '',
                'Current Company' => $candidate->current_company ?? '',
                'Current CTC' => $candidate->current_ctc ?? '',
                'Expected CTC' => $candidate->expected_ctc ?? '',
                'Negotiable CTC' => $candidate->neg_ctc ?? '',
                'Notice Period' => $candidate->notice_period ?? '',
                'Buyout' => $candidate->buyout ?? '',
                'Location' => $candidate->location ?? '',
                'Preferred Location' => $candidate->prelocation ?? '',
                'Interview Date' => $candidate->interview_date ?? '',
                'Interview Time' => $candidate->interview_time ?? '',
                'Interviewer Name' => $interviewer->name ?? '',
                'Interviewer Email' => $interviewer->email ?? '',
                'Interviewer Phone' => $interviewer->phoneno ?? '',
                'Interview Completed At' => $candidate->interview_completed_at ?? '',
                'Resume' => $candidate->resume ?? '',
                'Interview Outcome' => $candidate->interview_outcome ?? '',
                'Notes' => $candidate->notes ?? '',
                'Additional Notes' => $candidate->additional_notes ?? '',
                'Uploader Name' => $candidate_creator->name ?? '',
                'Uploader Email' => $candidate_creator->email ?? '',
                'Uploader Phone' => $candidate_creator->phoneno ?? '',
                'Last Updater Name' => $last_updated->name ?? '',
                'Last Updater Email' => $last_updated->email ?? '',
                'Last Updater Phone' => $last_updated->phoneno ?? '',
                'Update History' => $candidate->update_history ?? ''
            );
            array_push($data, $localdata);
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Candidate Name',
            'Candidate Email',
            'Candidate Phone',
            'Job',
            'Company',
            'Candidate DOB',
            'PAN Card',
            'Gender',
            'Experience',
            'Relevent Experience',
            'Current Company',
            'Current CTC',
            'Expected CTC',
            'Negotiable CTC',
            'Notice Period',
            'Buyout',
            'Location',
            'Preferred Location',
            'Interview Date',
            'Interview Time',
            'Interviewer Name',
            'Interviewer Email',
            'Interviewer Phone',
            'Interview Completed At',
            'Resume',
            'Interview Outcome',
            'Notes',
            'Additional Notes',
            'Uploader Name',
            'Uploader Email',
            'Uploader Phone',
            'Last Updater Name',
            'Last Updater Email',
            'Last Updater Phone',
            'Update History'
        ];
    }
}
