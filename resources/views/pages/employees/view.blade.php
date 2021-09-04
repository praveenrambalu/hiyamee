@extends('layouts.dashboard')
@section('employees','open')
@section('employees-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/employees">Employees</a>
            <span class="breadcrumb-item active">View</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float: left;">View Employees</h3>
                @if (Auth::user()->user_type=='admin')
                <a href="/export/employees" class="btn btn-dark float-right"   style="    margin-top: 10px;">Export Employees</a>
                @endif
            </div>
            <div class="card-body">
                <table  class="table datatable dt-responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phoneno</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($employees)>0)
                            @php $i=1; @endphp
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phoneno}}</td>
                                    <td>
                                        <a href="/candidates/view/{{$employee->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
