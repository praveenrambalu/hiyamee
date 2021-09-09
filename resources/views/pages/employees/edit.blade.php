@extends('layouts.dashboard')
@section('employees','open')
@section('employees-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/employees">Employees</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Employee</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Employee Name <span class="text-danger">*</span> </label>
                            <input type="text" value="{{$recruiter->name}}"  class="form-control" required placeholder="Ex: John Doe" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Employee Email  </label>
                            <input type="email" value="{{$recruiter->email}}" disabled class="form-control" required placeholder="jdoe@gmail.com" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Employee Phone No</label>
                            <input type="text" value="{{$recruiter->phoneno}}"  class="form-control"  placeholder="Ex: 9876543210" name="phoneno">
                        </div>
                       
                    </div>
            
                
                    <button type="submit" class="btn btn-primary">Edit Employee</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
