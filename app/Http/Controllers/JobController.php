<?php

namespace App\Http\Controllers;

use App\Models\AdditionalField;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\FieldList;
use App\Models\Job;
use App\Models\User;
use App\Notifications\CandidatesAssigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function addJob()
    {
        $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
        if ($company) {
            $fields = AdditionalField::where('status', 'active')->get();
            return view('pages.jobs.add')->with(['company' => $company, 'fields' => $fields]);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
    public function selectCompaniesBySuperadmin()
    {
        if (Auth::user()->user_type != 'superadmin') {
            abort(404);
        }
        $companies = Company::where('status', 'active')->get();
        return view('pages.jobs.select')->with('companies', $companies);
    }

    public function addJobBySuperadmin(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type == 'subadmin') {
            abort(401);
        }
        $company = Company::where('id', $id)->where('status', 'active')->first();
        if ($company) {
            $fields = AdditionalField::where('status', 'active')->get();
            return view('pages.jobs.add')->with(['company' => $company, 'fields' => $fields]);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
    public function addJobBySuperadminPost(Request $request, $id)
    {
        if (Auth::user()->user_type != 'superadmin' &&  Auth::user()->user_type == 'subadmin') {
            abort(401);
        }
        $company = Company::where('id', $id)->where('status', 'active')->first();
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
            $job->linkorfile = $request->linkorfile;
            if ($request->linkorfile == 'link') {
                $job->feedback = $request->feedback;
            } else {
                if ($feedback = $request->feedback) {
                    $filenameWithExt = $feedback->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $feedback->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $path = $feedback->storeAs('public/feedback/', $fileNameToStore);
                    $storagename = '/storage/feedback/' . $fileNameToStore;
                    $job->feedback = $storagename;
                }
            }
            $job->zoomlink = $request->zoomlink;



            $job->save();
            if ($request->additional_fields != "") {
                $additional_fields = $request->additional_fields;
                if (count($additional_fields) > 0) {
                    foreach ($additional_fields as $additional_field) {
                        if ($fielddb = AdditionalField::find($additional_field)) {

                            $field = new FieldList;
                            $field->job_id = $job->id;
                            $field->field_id = $additional_field;
                            $field->field_name = $fielddb->name;
                            $field->field_type = $fielddb->type;
                            $field->save();
                        }
                    }
                }
            }

            return redirect()->back()->with('success', 'Job Posted Successfully');
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
    public function addJobPost(Request $request)
    {
        // return $request;
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
            $job->experience_required = $request->experience_required;
            $job->created_by = Auth::user()->id;
            $job->linkorfile = $request->linkorfile;
            if ($request->linkorfile == 'link') {
                $job->feedback = $request->feedback;
            } else {
                if ($feedback = $request->feedback) {
                    $filenameWithExt = $feedback->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $feedback->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $path = $feedback->storeAs('public/feedback/', $fileNameToStore);
                    $storagename = '/storage/feedback/' . $fileNameToStore;
                    $job->feedback = $storagename;
                }
            }
            $job->zoomlink = $request->zoomlink;



            $job->save();
            if ($request->additional_fields != "") {
                $additional_fields = $request->additional_fields;
                if (count($additional_fields) > 0) {
                    foreach ($additional_fields as $additional_field) {
                        if ($fielddb = AdditionalField::find($additional_field)) {

                            $field = new FieldList;
                            $field->job_id = $job->id;
                            $field->field_id = $additional_field;
                            $field->field_name = $fielddb->name;
                            $field->field_type = $fielddb->type;
                            $field->save();
                        }
                    }
                }
            }

            return redirect()->back()->with('success', 'Job Posted Successfully');
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
    public function viewJobs(Request $request)
    {
        if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
        } else if (Auth::user()->user_type == 'employee') {
            $company = Company::where('id', Auth::user()->company_id)->where('status', 'active')->first();
        } else if (Auth::user()->user_type == 'superadmin') {
            $jobs = Job::where('status', 'active')->get();
            return view('pages.jobs.view-jobs')->with(['jobs' => $jobs]);
        } else {
            abort(404);
        }
        if ($company) {
            $jobs = Job::where('company_id', $company->id)->where('status', 'active')->get();
            return view('pages.jobs.view')->with(['company' => $company, 'jobs' => $jobs]);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
    public function viewJobsCompany(Request $request, $id)
    {
        $company = Company::where('status', 'active')->where('id', $id)->first();
        if ($company) {
            $jobs = Job::where('company_id', $company->id)->where('status', 'active')->get();
            return view('pages.jobs.view')->with(['company' => $company, 'jobs' => $jobs]);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Company is inactive or not assigned');
        }
    }
    public function viewJobDetail(Request $request, $id)
    {
        $employees = [];
        if (Auth::user()->user_type == 'superadmin' || Auth::user()->user_type == 'subadmin') {
            $job = Job::where('status', 'active')->where('id', $id)->first();
            $employees = User::where('status', 'active')->where('user_type', 'recruiter')->get();
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $id)->first();
            $employees = User::where('status', 'active')->where('user_type', 'employee')->where('company_id', $company->id)->get();
        } else if (Auth::user()->user_type == 'employee') {
            $company = Company::where('id', Auth::user()->company_id)->where('status', 'active')->first();
            $job = Job::where('status', 'active')->where('company_id', $company->id)->where('id', $id)->first();
        } else if (Auth::user()->user_type == 'recruiter') {
            $job = Job::where('status', 'active')->where('id', $id)->first();
        } else {
            abort(401);
        }





        if ($job) {
            if (Auth::user()->user_type == 'superadmin' || Auth::user()->user_type == 'admin') {
                $candidates = Candidate::where('job_id', $job->id)->get();
            } else {
                $candidates = Candidate::where('job_id', $job->id)->where('allocated_to', Auth::user()->id)->get();
            }
            $company = Company::find($job->company_id);
            $creator = User::find($job->created_by);
            return view('pages.jobs.viewDetail')->with(['creator' => $creator, 'company' => $company, 'job' => $job, 'candidates' => $candidates, 'employees' => $employees]);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry the Job is inactive or not found');
        }
    }
    public function allocateCandidates(Request $request)
    {
        if (Auth::user()->user_type == 'superadmin' || Auth::user()->user_type == 'subadmin') {
        } else if (Auth::user()->user_type == 'admin') {
            $company = Company::where('admin_id', Auth::user()->id)->where('status', 'active')->first();
        } else {
            abort(401);
        }



        $employee = User::find($request->employee);

        $candidates = $request->candidate;
        if ($candidates != "") {
            $count = 0;
            $names = "";
            $etc = 0;
            foreach ($candidates as $candidate) {
                $count++;
                $dbcand = Candidate::find($candidate);
                if ($count < 6) {
                    $names = $names . '' . $dbcand->candidate_name . ',';
                } else {
                    $etc = 1;
                }
                $dbcand->allocated_to = $request->employee;
                $dbcand->interview_date = $request->interview_date;
                $dbcand->interview_time = $request->interview_time;
                $dbcand->update_history = $dbcand->update_history . ' <br> *' . now() . ' : Candidate Allocated to ' . $employee->name . ' By ' . Auth::user()->name;
                $dbcand->save();
            }

            if ($etc) {
                $names = $names . ' etc.';
            }

            $employee->notify(new CandidatesAssigned($employee->name, $count, $names, $request->interview_date));

            return redirect()->back()->with('success', 'The candidates allocated Successfully ');
        } else {
            return redirect()->back()->with('error', 'No Candidates Selected ');
        }
    }

    public function BulkStatusUpdate(Request $request)
    {
        $row = 1;
        $defective = '';
        if (($handle = fopen($request->bulkfile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                if ($row != 1) {

                    if ($candidate = Candidate::find($data[0])) {
                        $candidate->interview_outcome = $data[1];
                        if ($data[2] != "") {
                            $candidate->location = $data[2];
                        }
                        if ($data[3] != "") {
                            $candidate->prelocation = $data[3];
                        }
                        if ($data[4] != "") {
                            $candidate->current_company = $data[4];
                        }
                        if ($data[5] != "") {
                            $candidate->current_ctc = $data[5];
                        }
                        if ($data[6] != "") {
                            $candidate->expected_ctc = $data[6];
                        }
                        if ($data[7] != "") {
                            $candidate->neg_ctc = $data[7];
                        }
                        if ($data[8] != "") {
                            $candidate->notice_period = $data[8];
                        }
                        if ($data[9] != "") {
                            $candidate->experience = $data[9];
                        }
                        if ($data[10] != "") {
                            $candidate->relexperience = $data[10];
                        }
                        if ($data[11] != "") {
                            $candidate->buyout = $data[11];
                        }
                        if ($data[12] != "") {
                            $candidate->notes = $candidate->notes . '<br>  ' .  $data[12];
                        }
                        if ($data[13] != "") {
                            $candidate->additional_notes = $candidate->additional_notes . '<br>   ' .   $data[13];
                        }



                        $candidate->interviewer_id = Auth::user()->id;
                        $candidate->updated_by = Auth::user()->id;
                        $candidate->update_history = $candidate->update_history . ' <br> *' . now() . ' : Candidate Updated by ' . Auth::user()->name . '   with status  ' . $candidate->interview_outcome . ' <br>';
                        if (Auth::user()->user_type == 'superadmin' || Auth::user()->user_type == 'subadmin') {
                            $candidate->save();
                        } else if (Auth::user()->user_type == 'admin') {
                            $company = Company::find($candidate->company_id);
                            if ($company->admin_id == Auth::user()->id) {
                                $candidate->save();
                            }
                        } else {
                            if ($candidate->allocated_to == Auth::user()->id) {
                                $candidate->save();
                            }
                        }
                    }
                }

                $row++;
            }

            return redirect()->back()->with('success', 'Candidates Updated Successfully ');


            fclose($handle);
        }
    }

    public function editJob(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $fields = AdditionalField::where('status', 'active')->get();
        return view('pages.jobs.edit')->with(['job' => $job, 'fields' => $fields]);
    }

    public function editJobPost(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->employment_type = $request->employment_type;
        $job->job_title = $request->job_title;
        $job->location = $request->location;
        $job->description = $request->description;
        $job->primary_skill = $request->primary_skill;
        $job->skills_required = $request->skills_required;
        $job->how_many_hires = $request->how_many_hires;
        $job->annual_ctc = $request->annual_ctc;
        $job->zoomlink = $request->zoomlink;
        $job->experience_required = $request->experience_required;

        $job->save();


        if ($request->additional_fields != "") {
            $additional_fields = $request->additional_fields;
            if (count($additional_fields) > 0) {
                foreach ($additional_fields as $additional_field) {
                    if ($fielddb = AdditionalField::find($additional_field)) {
                        if (!$exist = FieldList::where('job_id', $job->id)->where('field_id', $additional_field)->first()) {

                            $field = new FieldList;
                            $field->job_id = $job->id;
                            $field->field_id = $additional_field;
                            $field->field_name = $fielddb->name;
                            $field->field_type = $fielddb->type;
                            $field->save();
                        }
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Job Posted Successfully');
    }
}
