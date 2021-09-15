@extends('layouts.dashboard')


@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Profile</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float: left;">My Profile</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" required placeholder="Ex: John Doe" value="{{$profile->name}}" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Email <span class="text-danger">*</span> </label>
                            <input type="email" class="form-control" disabled required value="{{$profile->email}}" placeholder="jdoe@gmail.com" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label > Phone No</label>
                            <input type="text" pattern="^[6-9]\d{9}$" class="form-control" value="{{$profile->phoneno}}"  placeholder="Ex: 9876543210" name="phoneno">
                        </div>
                       
                    </div>
                    <hr>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label > Old Password <small>(Leave empty if you don't want to change your password)</small></label>
                            <input type="text" class="form-control"   placeholder="Enter your old password" name="password">
                        </div>
                        <div class="form-group col-md-6">
                            <label > New Password <small>(Leave empty if you don't want to change your password)</small></label>
                            <input type="text" class="form-control"   placeholder="Enter your New password" name="newpassword">
                        </div>
                       
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
