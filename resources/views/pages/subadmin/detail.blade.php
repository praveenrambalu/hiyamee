@extends('layouts.dashboard')
@section('subadmin','open')
@section('subadmin-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/admin">Admin</a>
            <a class="breadcrumb-item" href="/admin/view">View</a>
            <span class="breadcrumb-item active">{{$admin->name}}</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float: left;">Admin Detail</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name: </th>
                        <td>{{$admin->name}}</td>
                        <th>Email: </th>
                        <td>{{$admin->email}}</td>
                        <th>Phone: </b></th>
                        <td>{{$admin->phoneno}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float:left">Assigned Companies</h3>
                @if (Auth::user()->user_type=='superadmin')
                    <a href="/admin/assign/{{$admin->id}}" class="btn btn-dark" style="float:right; margin-top:5px">Assign Companies</a>
                @endif
            </div>
            <div class="card-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Company Name</th>
                                <th>Industry</th>
                                <th>Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @if (count($companies)>0)
                        @php $i=1; @endphp
                            @foreach ($companies as $assign)
                                @php
                                    $company = \App\Models\Company::find($assign->company_id);       
                                @endphp 
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{$company->logo}}" class="img img-responsive" style="height:50px; width:50px; border-radius:50%;" alt="{{$company->company_name}} Logo"></td>
                                    <td>{{$company->company_name}}</td>
                                    <td>{{$company->industry}}</td>
                                    <td>{{$company->location}} - {{$company->pincode}}</td>
                                    <td><a href="/admin/assign/delete/{{$assign->id}}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a></td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection
