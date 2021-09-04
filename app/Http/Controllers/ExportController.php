<?php

namespace App\Http\Controllers;

use App\Exports\CandidateExport;
use App\Exports\CompanyExport;
use App\Exports\EmployeeExport;
use App\Exports\JobExport;
use App\Models\Company;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function companies()
    {
        return Excel::download(new CompanyExport, 'companies_' . now() . '.csv');
    }
    public function employees()
    {
        return Excel::download(new EmployeeExport, 'employees_' . now() . '.csv');
    }
    public function candidates()
    {
        return Excel::download(new CandidateExport, 'candidates_' . now() . '.csv');
    }
    public function jobs(Request $request, $id)
    {
        return Excel::download(new JobExport($id), 'jobs_' . now() . '.csv');
    }
}
