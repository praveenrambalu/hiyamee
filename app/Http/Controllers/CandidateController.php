<?php

namespace App\Http\Controllers;

use App\Models\AddFieldData;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\FieldList;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function addCandidate(Request $request, $id)
    {
        if (Auth::user()->user_type == 'superadmin') {
            $job = Job::where('status', 'active')->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'employee') {
            $company = Company::where('id', Auth::user()->company_id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'recruiter') {
            $job = Job::where('status', 'active')->where('id', $id)->first();
        } else {
            abort(401);
        }

        if ($job) {
            $candidates = Candidate::where('job_id', $job->id)->get();
            $company = Company::find($job->company_id);
            $creator = User::find($job->created_by);
            return view('pages.candidates.add')->with(['creator' => $creator, 'company' => $company, 'job' => $job, 'candidates' => $candidates]);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Job is inactive or not found');
        }
    }
    public function addCandidatePost(Request $request, $id)
    {
        if (Auth::user()->user_type == 'superadmin') {
            $job = Job::where('status', 'active')->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'employee') {
            $company = Company::where('id', Auth::user()->company_id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'recruiter') {
            $job = Job::where('status', 'active')->where('id', $id)->first();
        } else {
            abort(401);
        }

        if ($job) {
            $company = Company::find($job->company_id);

            $candidate = new Candidate;
            $candidate->job_id = $job->id;
            $candidate->company_id = $job->company_id;
            $candidate->candidate_name = $request->candidate_name;
            $candidate->candidate_email = $request->candidate_email;
            $candidate->candidate_phone = $request->candidate_phone;
            $candidate->dateofbirth = $request->dateofbirth;
            $candidate->pancard = $request->pancard;
            $candidate->gender = $request->gender;
            $candidate->experience = $request->experience;
            $candidate->relexperience = $request->relexperience;
            $candidate->current_company = $request->current_company;
            $candidate->current_ctc = $request->current_ctc;
            $candidate->expected_ctc = $request->expected_ctc;
            $candidate->neg_ctc = $request->neg_ctc;
            $candidate->notice_period = $request->notice_period;
            $candidate->buyout = $request->buyout;
            $candidate->location = $request->location;
            $candidate->prelocation = $request->prelocation;
            $candidate->job_position = $job->job_title;
            $candidate->job_company = $company->company_name;
            $candidate->uploaded_by = Auth::user()->id;
            $candidate->update_history = '*' . now() . ' : Candidate Uploaded Via Single Upload  by ' . Auth::user()->name . '<br>';
            if ($resume = $request->resume) {
                $filenameWithExt = $resume->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $resume->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $resume->storeAs('public/resume/', $fileNameToStore);
                $storagename = '/storage/resume/' . $fileNameToStore;
                $candidate->resume = $storagename;
            }



            $candidate->save();
            return redirect()->back()->with('success', 'Candidate added Successfully ');
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Job is inactive or not found');
        }
    }
    public function addCandidateBulkPost(Request $request, $id)
    {
        if (Auth::user()->user_type == 'superadmin') {
            $job = Job::where('status', 'active')->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'employee') {
            $company = Company::where('id', Auth::user()->company_id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'recruiter') {
            $job = Job::where('status', 'active')->where('id', $id)->first();
        } else {
            abort(401);
        }

        if ($job) {
            $company = Company::find($job->company_id);



            $row = 1;
            $defective = '';
            $emailexists = '';
            if (($handle = fopen($request->bulkfile, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    if ($row != 1) {
                        $candidate = new Candidate;
                        $candidate->job_id = $job->id;
                        $candidate->company_id = $job->company_id;

                        $candidate->candidate_name = $data[0];
                        $candidate->candidate_email = $data[1];
                        $candidate->candidate_phone = $data[2];
                        $candidate->dateofbirth = $data[3];
                        $candidate->pancard = $data[4];
                        $candidate->gender = $data[5];
                        $candidate->experience = $data[6];
                        $candidate->relexperience = $data[7];
                        $candidate->current_company = $data[8];
                        $candidate->current_ctc = $data[9];
                        $candidate->expected_ctc = $data[10];
                        $candidate->neg_ctc = $data[11];
                        $candidate->notice_period = $data[12];
                        $candidate->buyout = $data[13];
                        $candidate->location = $data[14];
                        $candidate->prelocation = $data[15];
                        $candidate->resume = $data[16];

                        $candidate->job_position = $job->job_title;
                        $candidate->job_company = $company->company_name;
                        $candidate->uploaded_by = Auth::user()->id;
                        $candidate->update_history = '*' . now() . ' : Candidate Uploaded Via Bulk Upload  by ' . Auth::user()->name . '<br>';



                        $candidate->save();
                    }

                    $row++;
                }


                fclose($handle);
            }




            return redirect()->back()->with('success', 'Candidate added Successfully ');
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Job is inactive or not found');
        }
    }
    public function candidateDetail(Request $request, $id)
    {
        $candidate = Candidate::find($id);
        $job_id = $candidate->job_id;
        if (Auth::user()->user_type == 'superadmin') {
            $job = Job::where('status', 'active')->where('id', $job_id)->first();
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $job_id)->first();
        } else if (Auth::user()->user_type == 'employee') {
            $company = Company::where('id', Auth::user()->company_id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $job_id)->first();
        } else if (Auth::user()->user_type == 'recruiter') {
            $job = Job::where('status', 'active')->where('id', $job_id)->first();
        } else {
            abort(401);
        }

        if ($job) {
            $company = Company::find($job->company_id);
            $job_creator = User::find($job->created_by);
            $candidate_creator = User::find($candidate->uploaded_by);
            if ($candidate->interviewer_id != NULL) {
                $interviewer = User::find($candidate->interviewer_id);
            } else {
                $interviewer = [];
            }

            $addfields = FieldList::where('job_id', $job->id)->where('status', 'active')->get();
            $fielddatas = AddFieldData::where('job_id', $job->id)->where('candidate_id', $candidate->id)->get();
            return view('pages.candidates.viewDetail')->with([
                'company' => $company,
                'job' => $job,
                'job_creator' => $job_creator,
                'candidate_creator' => $candidate_creator,
                'candidate' => $candidate,
                'interviewer' => $interviewer,
                'addfields' => $addfields,
                'fielddatas' => $fielddatas
            ]);

            // return redirect()->back()->with('success', 'Candidate added Successfully ');
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Job is inactive or not found');
        }
    }
    public function candidateStatusUpdate(Request $request, $id)
    {
        // return $request;
        $candidate = Candidate::find($id);
        $job_id = $candidate->job_id;
        if (Auth::user()->user_type == 'superadmin') {
            $job = Job::where('status', 'active')->where('id', $job_id)->first();
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $job_id)->first();
        } else if (Auth::user()->user_type == 'recruiter') {
            $job = Job::where('status', 'active')->where('id', $job_id)->first();
        } else if (Auth::user()->user_type == 'employee') {
            $job = Job::where('status', 'active')->where('id', $job_id)->first();
            if ($candidate->allocated_to != Auth::user()->id) {
                abort(401);
            }
        } else {
            abort(401);
        }

        if ($job) {
            $company = Company::find($job->company_id);
            $candidate->interview_outcome = $request->interview_outcome;
            $candidate->location = $request->location;
            $candidate->prelocation = $request->prelocation;
            $candidate->current_ctc = $request->current_ctc;
            $candidate->expected_ctc = $request->expected_ctc;
            $candidate->neg_ctc = $request->neg_ctc;
            $candidate->notice_period = $request->notice_period;
            $candidate->experience = $request->experience;
            $candidate->relexperience = $request->relexperience;
            $candidate->buyout = $request->buyout;
            $candidate->notes = $candidate->notes . '<br>  ' .  $request->notes;
            $candidate->additional_notes = $candidate->additional_notes . '<br>   ' .   $request->additional_notes;
            $candidate->interviewer_id = Auth::user()->id;
            $candidate->interview_completed_at = now();
            $candidate->updated_by = Auth::user()->id;
            $candidate->update_history = $candidate->update_history . ' <br> *' . now() . ' : Candidate Updated by ' . Auth::user()->name . '   with status  ' . $request->interview_outcome . ' <br>';
            $candidate->save();
            $fieldLists = FieldList::where('job_id', $job->id)->where('status', 'active')->get();

            if (count($fieldLists) > 0) {
                foreach ($fieldLists as $fieldList) {
                    $fielddata = new AddFieldData;
                    $fielddata->candidate_id = $candidate->id;
                    $fielddata->job_id = $fieldList->job_id;
                    $fielddata->field_id = $fieldList->field_id;
                    $fielddata->field_name = $fieldList->field_name;
                    $fieldname = $fieldList->field_name;
                    $fielddata->field_value = $request->$fieldname;
                    $fielddata->save();
                    // return $fielddata;
                }
            }

            return redirect()->back()->with('success', 'Candidate Updated Successfully ');
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Job is inactive or not found');
        }
    }
    public function viewAllCandidates(Request $request)
    {
        $employees = [];
        if (Auth::user()->user_type == 'superadmin') {
            $employees = User::where('status', 'active')->where('user_type', 'recruiter')->get();
            $candidates = Candidate::all();
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
            $employees = User::where('status', 'active')->where('user_type', 'employee')->where('company_id', $company->id)->get();
            $candidates = Candidate::where('company_id', $company->id)->get();
        } else if (Auth::user()->user_type == 'employee') {
            $candidates = Candidate::where('allocated_to', Auth::user()->id)->get();
        } else if (Auth::user()->user_type == 'recruiter') {
            $candidates = Candidate::where('allocated_to', Auth::user()->id)->get();
        } else {
            abort(401);
        }





        return view('pages.candidates.viewAllCandidates')->with(['candidates' => $candidates, 'employees' => $employees]);
    }
    public function viewCandidatesbyUser(Request $request, $id)
    {
        if (Auth::user()->user_type != 'admin' && Auth::user()->user_type != 'superadmin') {
            abort(401);
        }
        $candidates = Candidate::where('allocated_to', $id)->get();
        return view('pages.candidates.viewAllCandidatesByUser')->with(['candidates' => $candidates]);
    }
    public function editCandidate(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin' && Auth::user()->user_type != "admin") {
            abort(401);
        }
        $candidate = Candidate::findOrFail($id);
        if ($candidate->interview_outcome != 'Ready') {
            abort(403);
        }

        if (Auth::user()->user_type == 'admin') {
            if ($company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first()) {

                if ($candidate->company_id != $company->id) {
                    abort(403);
                }
            } else {
                abort(401);
            }
        }

        return view('pages.candidates.edit')->with(['candidate' => $candidate]);
    }

    public function editCandidatePost(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin' && Auth::user()->user_type != "admin") {
            abort(401);
        }
        $candidate = Candidate::findOrFail($id);
        if ($candidate->interview_outcome != 'Ready') {
            abort(403);
        }

        if (Auth::user()->user_type == 'admin') {
            if ($candidate->company_id != Auth::user()->company_id) {
                abort(403);
            }
        }


        $candidate->candidate_name = $request->candidate_name;
        $candidate->candidate_email = $request->candidate_email;
        $candidate->candidate_phone = $request->candidate_phone;
        $candidate->dateofbirth = $request->dateofbirth;
        $candidate->pancard = $request->pancard;
        $candidate->gender = $request->gender;
        $candidate->experience = $request->experience;
        $candidate->relexperience = $request->relexperience;
        $candidate->current_company = $request->current_company;
        $candidate->current_ctc = $request->current_ctc;
        $candidate->expected_ctc = $request->expected_ctc;
        $candidate->neg_ctc = $request->neg_ctc;
        $candidate->notice_period = $request->notice_period;
        $candidate->buyout = $request->buyout;
        $candidate->location = $request->location;
        $candidate->prelocation = $request->prelocation;
        $candidate->update_history = '*' . now() . ' : Candidate Edited   by ' . Auth::user()->name . '<br>';
        if ($resume = $request->resume) {
            $filenameWithExt = $resume->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $resume->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $resume->storeAs('public/resume/', $fileNameToStore);
            $storagename = '/storage/resume/' . $fileNameToStore;
            $candidate->resume = $storagename;
        }

        $candidate->save();
        return redirect()->back()->with('success', 'Candidate updated Successfully ');
    }
}
