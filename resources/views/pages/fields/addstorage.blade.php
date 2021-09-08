@extends('layouts.dashboard')
@section('fields','open')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Fields</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Fields</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Field Name <small>(No Space Between Words)</small> <span class="text-danger">*</span>  </label>
                            <input type="file" class="form-control" required placeholder="Ex: FieldName" name="resume" >
                        </div>
                        
                        
                    </div>
                 
                
                    <button type="submit" class="btn btn-primary">Add Field</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
