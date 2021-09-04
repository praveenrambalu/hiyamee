<?php

namespace App\Http\Controllers;

use App\Exports\CompanyExport;
use App\Exports\EmployeeExport;
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
}
