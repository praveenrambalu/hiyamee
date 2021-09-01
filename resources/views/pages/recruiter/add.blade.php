@extends('layouts.dashboard')
@section('recruiter','open')
@section('recruiter-add','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Recruiter</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Recruiter</h3>
                <small>Password will be generate automatically will be send it the Recruiter.</small>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Recruiter Name</label>
                            <input type="text" class="form-control" required placeholder="Ex: John Doe" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Recruiter Email</label>
                            <input type="text" class="form-control" required placeholder="jdoe@gmail.com" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Recruiter Phone No</label>
                            <input type="text" class="form-control"  placeholder="Ex: 9876543210" name="phoneno">
                        </div>
                       
                    </div>
            
                
                    <button type="submit" class="btn btn-primary">Add Recruiter</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
