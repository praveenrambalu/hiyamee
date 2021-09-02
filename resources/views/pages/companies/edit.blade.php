@extends('layouts.dashboard')
@section('companies','open')
@section('companies-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/companies">Companies</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header text-right">
                <br>
                <button  class="btn btn-dark  " data-toggle="modal" data-target="#updateAdmin">Edit Admin Info</button>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Company Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" value="{{$company->company_name}}" required placeholder="Company Name" name="company_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Industry  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$company->industry}}" required placeholder="Industry" name="industry">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Company Logo  <span><img src="{{$company->logo}}" alt="Logo" class="img img-responsive " style="height:30px; width:30px;"></span> </label>
                            <input type="file"   class="form-control"  name="logo" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Location  <span class="text-danger">*</span> </label>
                            <input type="text" required  value="{{$company->location}}"  class="form-control"  placeholder="Ex: Banglore, India" name="location">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Website  <span class="text-danger">*</span> </label>
                            <input type="url" required class="form-control" value="{{$company->website}}"  placeholder="Ex: https://apple.com" name="website">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Email  <span class="text-danger">*</span> </label>
                            <input type="email" required class="form-control" value="{{$company->email}}"  placeholder="Ex: contact@apple.com" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Contact No</label>
                            <input type="text"  class="form-control" value="{{$company->contactno}}" placeholder="Ex: 987654**** " name="contactno">
                        </div>
                        <div class="form-group col-md-6">
                            <label >PinCode  <span class="text-danger">*</span> </label>
                            <input type="text" required class="form-control" value="{{$company->pincode}}"  placeholder="Ex: 600015" name="pincode">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label >Description  <span class="text-danger">*</span> </label>
                        <textarea type="text" class="form-control ckeditor" required name="description">{{$company->description}}</textarea>
                        
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update Company</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="updateAdmin">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateAdminTitle">Admin Update</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="/companies/{{$company->id}}/edit-admin" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
        
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Admin Name <span class="text-danger">*</span>  </label>
                                    <input type="text" value="{{$admin->name}}" class="form-control" required placeholder="Ex: John Doe" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Admin Phone No</label>
                                    <input type="text" value="{{$admin->phoneno}}" class="form-control"  placeholder="Ex: 9876543210" name="phoneno">
                                </div>
                            </div>
                    
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
