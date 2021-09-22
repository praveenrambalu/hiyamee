<?php

namespace App\Http\Controllers;

use App\Models\AdditionalField;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdditionalFieldsController extends Controller
{
    public function addFields()
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        $fields = AdditionalField::where('status', 'active')->get();
        return view('pages.fields.add')->with([
            'fields' => $fields
        ]);
    }
    public function TermsConditions()
    {
        return view('pages.legal.terms-conditions');
    }
    public function PrivacyPolicy()
    {
        return view('pages.legal.privacy-policy');
    }
    public function addFieldsPost(Request $request)
    {
        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        if ($field = AdditionalField::where('name', $request->name)->first()) {
            return redirect()->back()->with('error', 'The name is already existed');
        } else {
            $field = new AdditionalField;
            $field->name = $request->name;
            $field->type = $request->type;
            $field->save();
            return redirect()->back()->with('success', 'Field added successfully');
        }
    }


    public function addStorage()
    {
        // $url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        // $images = [];
        // return $files = Storage::disk('s3');



        $url = 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . '/';
        $resumes = [];
        // $files = Storage::disk('s3')->files('resumes');
        // foreach ($files as $file) {
        //     $resumes[] = [
        //         'name' => str_replace('resumes/', '', $file),
        //         'url' => $url . $file
        //     ];
        // }
        return view('pages.fields.addstorage')->with([
            'resumes' => $resumes
        ]);
    }
    public function addStoragePost(Request $request)
    {

        $resumes = $request->resume;
        $data = [];
        foreach ($resumes as $resume) {
            $path = $resume->store('resumes', 's3');
            $name = $resume->getClientOriginalName();
            $url =  Storage::disk('s3')->url($path);
            $localdata = [
                'name' => $name,
                'url' => $url
            ];
            array_push($data, $localdata);
        }
        return view('pages.fields.addstorage')->with([
            'resumes' => $data
        ]);
    }


    public function cronTest()
    {



        $companies = count(Company::where('status', 'active')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get());
        $jobs = count(Job::where('status', 'active')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get());
        $candidates = count(Candidate::where('status', 'active')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get());
        $SelectedCandidates = count(Candidate::where('status', 'active')->where('interview_outcome', 'Selected')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get());
        $RejectedCandidates = count(Candidate::where('status', 'active')->where('interview_outcome', 'Rejected')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get());

        $data = "
        <table>
        <tr>
            <th colspan='2' style='text-align:center'>
                <h3 style='text-align:center'>Weekly Report </h3>
            </th>
        </tr>
        <tr style='text-align:left'>
        <th>Total Companies </th>
        <th style='padding-left:25px'>" . $companies . "</th>
        </tr>
        <tr style='text-align:left'>
        <th>Total Jobs </th>
        <th style='padding-left:25px'>" . $jobs . "</th>
        </tr>
        <tr style='text-align:left'>
        <th>Total Applications </th>
        <th style='padding-left:25px'>" . $candidates . "</th>
        </tr>
        <tr style='text-align:left'>
        <th>Selected Applications </th>
        <th style='padding-left:25px'>" . $SelectedCandidates . "</th>
        </tr>
        <tr style='text-align:left'>
        <th>Rejected Applications </th>
        <th style='padding-left:25px'>" . $RejectedCandidates . "</th>
        </tr>
    </table>
            ";

        echo $data;
    }
}
