<?php

namespace App\Http\Controllers;

use App\Exports\CompanyExport;
use App\Models\Company;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function companies()
    {
        // $data = [];
        // $companies = Company::all();
        // foreach ($companies as $company) {
        //     $localdata = array('Name' => $company->company_name, 'Industry' => $company->industry);
        //     array_push($data, $localdata);
        // }
        // return $data;
        // $data = [
        //     [
        //         'name' => 'Povilas',
        //         'surname' => 'Korop',
        //         'email' => 'povilas@laraveldaily.com',
        //         'twitter' => '@povilaskorop'
        //     ],
        //     [
        //         'name' => 'Taylor',
        //         'surname' => 'Otwell',
        //         'email' => 'taylor@laravel.com',
        //         'twitter' => '@taylorotwell'
        //     ]
        // ];

        // return  $data;
        return Excel::download(new CompanyExport, 'companies.csv');
    }
}
