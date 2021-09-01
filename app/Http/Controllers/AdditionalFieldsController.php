<?php

namespace App\Http\Controllers;

use App\Models\AdditionalField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
