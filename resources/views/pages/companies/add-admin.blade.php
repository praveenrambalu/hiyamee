@extends('layouts.dashboard')
@section('companies','open')
@section('companies-add','active')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
               <div class="container">
                <div class="row">
                    <div class="col-md-4 align-self-center">
                        <img class="img-fluid" height="150" width="150" src="{{$company->logo}}" alt="">
                    </div>
                    <div class="col-md-8 align-self-center">
                        <h4 class="m-b-10">{{$company->company_name}}</h4>
                        <div class="d-flex align-items-center m-t-5 m-b-15">
                            <div class="">
                                <span class="text-gray font-weight-semibold">{{$company->location}}</span>
                                <span class="m-h-5 text-gray">-</span>
                                <span class="text-gray">{{$company->pincode}}</span>
                            </div>
                        </div>
                        <p class="m-b-20">{!!$company->description!!}</p>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Admin</h3>
                <small>Password will be generate automatically will be send it the admin.</small>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Admin Name</label>
                            <input type="text" class="form-control" required placeholder="Ex: John Doe" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Admin Email</label>
                            <input type="text" class="form-control" required placeholder="jdoe@gmail.com" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Admin Phone No</label>
                            <input type="text" class="form-control"  placeholder="Ex: 9876543210" name="phoneno">
                        </div>
                       
                    </div>
            
                
                    <button type="submit" class="btn btn-primary">Add Admin</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
