@extends('layouts.dashboard')
@section('jobs','open')
@section('jobs-add','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Add Job</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float: left;">View Companies</h3>
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
                                <tr data-url="/jobs/add/{{$company->id}}">
                                    <td>{{$i++}}</td>
                                    <td class="urlclicker"><img src="{{$company->logo}}" class="img img-responsive" style="height:50px; width:50px; border-radius:50%;" alt="{{$company->company_name}} Logo"></td>
                                    <td class="urlclicker">{{$company->company_name}}</td>
                                    <td class="urlclicker">{{$company->industry}}</td>
                                    <td class="urlclicker">{{$company->location}} - {{$company->pincode}}</td>
                                    <td class="urlclicker"><a href="{{$company->website}}" target="_blank">{{$company->website}}</a></td>
                                    <td class="urlclicker"><a href="mailto:{{$company->email}}" >{{$company->email}}</a> <br> <a href="tel:{{$company->contactno}}" >{{$company->contactno}}</a></td>
                                    <td class="urlclicker">{{$company->status}}</td>
                                    <td>
                                        <a href="/jobs/add/{{$company->id}}"  class="btn btn-dark" title="Add Job Post"><i class="fas fa-plus"></i></a>
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
