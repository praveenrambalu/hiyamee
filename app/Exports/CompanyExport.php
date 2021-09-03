<?php

namespace App\Exports;

use App\Models\Company;
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
            $localdata = array(
                'Name' => $company->company_name,
                'Industry' => $company->industry,
                'Description' => $company->description,
                'Location' => $company->location,
                'Website' => $company->website,
                'Phone' => $company->contactno,
                'Email' => $company->email,
                'Pincode' => $company->pincode,
                'Status' => $company->status,
                'AdminName' => $admin->name,
                'AdminEmail' => $admin->email,
                'AdminPhone' => $admin->phone,
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
            'Status',
            'AdminName',
            'AdminEmail',
            'AdminPhone',
        ];
    }
}
