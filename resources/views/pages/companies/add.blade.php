@extends('layouts.dashboard')
@section('companies','open')
@section('companies-add','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/companies">Companies</a>
            <span class="breadcrumb-item active">Add</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Company Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" required placeholder="Company Name" name="company_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Industry  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required placeholder="Industry" name="industry">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Company Logo  <span class="text-danger">*</span> </label>
                            <input type="file" required  class="form-control"  name="logo" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Location  <span class="text-danger">*</span> </label>
                            <input type="text" required  class="form-control"  placeholder="Ex: Banglore, India" name="location">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Website  <span class="text-danger">*</span> </label>
                            <input type="url" required class="form-control"  placeholder="Ex: https://apple.com" name="website">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Email  <span class="text-danger">*</span> </label>
                            <input type="email" required class="form-control"  placeholder="Ex: contact@apple.com" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Contact No</label>
                            <input type="text"  class="form-control"  placeholder="Ex: 987654**** " name="contactno">
                        </div>
                        <div class="form-group col-md-6">
                            <label >PinCode  <span class="text-danger">*</span> </label>
                            <input type="text" required class="form-control"   placeholder="Ex: 600015" name="pincode">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label >Description  <span class="text-danger">*</span> </label>
                        <textarea type="text" class="form-control ckeditor" required name="description"></textarea>
                        
                    </div>
                
                    <button type="submit" class="btn btn-primary">Add Company</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
