<?php

namespace App\Http\Controllers;

use App\Models\AdditionalField;
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

        if (Auth::user()->user_type != 'superadmin') {
            return redirect('/dashboard')->with('error', 'Unauthorized');
        }
        $fields = AdditionalField::where('status', 'active')->get();
        return view('pages.fields.addstorage')->with([
            'fields' => $fields
        ]);
    }
    public function addStoragePost(Request $request)
    {
        $path = $request->file('resume')->store('resumes', 's3');
        return Storage::disk('s3')->url($path);
        // if ($request->hasfile('resume')) {
        //     $file = $request->file('resume');
        //     $name = time() . $file->getClientOriginalName();
        //     $filePath = 'resumes/' . $name;
        //     return Storage::disk('s3')->put($filePath, file_get_contents($file));
        // }
    }
}
