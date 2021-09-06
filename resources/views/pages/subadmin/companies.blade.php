@extends('layouts.dashboard')
@section('companies','open')
@section('companies-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/admin">Admin</a>
            <span class="breadcrumb-item active">Assign Company</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float: left;">Assign Companies</h3>
            </div>
            <form action="" method="post">
                @csrf
            <div class="card-body">
                <table  class="table datatable dt-responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>-</th>
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>Industry</th>
                            <th>Location</th>
                            <th>Website</th>
                            <th>Contact Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($companies)>0)
                            @php $i=1; @endphp
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><input type="checkbox"  name="company[]" value="{{$company->id}}" ></td>
                                    <td><img src="{{$company->logo}}" class="img img-responsive" style="height:50px; width:50px; border-radius:50%;" alt="{{$company->company_name}} Logo"></td>
                                    <td>{{$company->company_name}}</td>
                                    <td>{{$company->industry}}</td>
                                    <td>{{$company->location}} - {{$company->pincode}}</td>
                                    <td><a href="{{$company->website}}" target="_blank">{{$company->website}}</a></td>
                                    <td><a href="mailto:{{$company->email}}" >{{$company->email}}</a> <br> <a href="tel:{{$company->contactno}}" >{{$company->contactno}}</a></td>
                                   
                                </tr>
                            @endforeach
                        @endif
                       
                    </tbody>
                </table>
                <hr>
    
                    
                <div class=" row align-items-center">
                 
                    <div class="form-group col-sm-12 text-center align-self-center">
                        <button type="submit" class="btn btn-primary">Allocate </button>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
@endsection
