<?php

namespace App\Exports;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyExport implements FromCollection, WithHeadings
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
        $companies = Company::all();
        foreach ($companies as $company) {
            $admin = User::find($company->admin_id);
            $jobs = Job::where('status', 'active')->where('company_id', $company->id)->get();
            $localdata = array(
                'Name' => $company->company_name,
                'Industry' => $company->industry,
                'Description' => $company->description,
                'Location' => $company->location,
                'Website' => $company->website,
                'Phone' => $company->contactno,
                'Email' => $company->email,
                'Pincode' => $company->pincode,
                'Total Jobs' => count($jobs),
                'Admin Name' => $admin->name ?? '',
                'Admin Email' => $admin->email ?? '',
                'Admin Phone' => $admin->phone ?? '',
                'Status' => $company->status,
            );
            array_push($data, $localdata);
        }
        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Industry',
            'Description',
            'Location',
            'Website',
            'Phone',
            'Email',
            'Pincode',
            'Total Jobs',
            'Admin Name',
            'Admin Email',
            'Admin Phone',
            'Status',
        ];
    }
}
