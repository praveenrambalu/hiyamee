@extends('layouts.dashboard')
@section('subadmin','open')
@section('subadmin-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/admin">Admin</a>
            <span class="breadcrumb-item active">View</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float: left;">View Admins</h3>
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
                        @if (count($admins)>0)
                            @php $i=1; @endphp
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->phoneno}}</td>
                                    <td>
                                        <a href="/admin/view/{{$admin->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
