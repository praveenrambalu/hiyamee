@extends('layouts.dashboard')
@section('companies','open')
@section('companies-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/companies">Companies</a>
            <span class="breadcrumb-item active">View</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float: left;">View Companies</h3>
                @if (Auth::user()->user_type=='superadmin')
                    
                <a href="/export/companies" class="btn btn-dark float-right"   style="    margin-top: 10px;">Export Companies</a>
                @endif
            </div>
            <div class="card-body">
                <table  class="table datatable dt-responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>Industry</th>
                            <th>Location</th>
                            <th>Website</th>
                            <th>Contact Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($companies)>0)
                            @php $i=1; @endphp
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{$company->logo}}" class="img img-responsive" style="height:50px; width:50px; border-radius:50%;" alt="{{$company->company_name}} Logo"></td>
                                    <td>{{$company->company_name}}</td>
                                    <td>{{$company->industry}}</td>
                                    <td>{{$company->location}} - {{$company->pincode}}</td>
                                    <td><a href="{{$company->website}}" target="_blank">{{$company->website}}</a></td>
                                    <td><a href="mailto:{{$company->email}}" >{{$company->email}}</a> <br> <a href="tel:{{$company->contactno}}" >{{$company->contactno}}</a></td>
                                    <td>{{$company->status}}</td>
                                    <td>
                                        <a href="/jobs/view/{{$company->id}}"  class="btn btn-primary" title="View Jobs"><i class="fas fa-eye"></i></a>
                                        @if (Auth::user()->user_type=='superadmin')
                                            
                                        <a href="/companies/edit/{{$company->id}}"  class="btn btn-warning" title="Edit Company"><i class="fas fa-edit"></i></a>
                                        <a href="/jobs/add/{{$company->id}}"  class="btn btn-dark" title="Add Job Post"><i class="fas fa-plus"></i></a>
                                       
                                        <a href="#" onclick="alert('Not Implemented')" class="btn btn-danger" title=""><i class="fas fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
