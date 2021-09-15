@extends('layouts.dashboard')
@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            {{-- <a class="breadcrumb-item" href="#">UI Elements</a> --}}
            {{-- <span class="breadcrumb-item active">Dashboard</span> --}}
        </nav>
    </div>
</div>
@if (Auth::user()->user_type=='superadmin')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="" method="get">
                        <div class="form-group row ">
                            <div class="col-sm-6 align-self-center">
                                <label for="">Dashboard</label>
                                <select name="company_id" class="form-control" id="">
                                    @if (count($AllCompanies=\App\Models\Company::all())>0)
                                            <option value="0">Overall</option>
                                        @foreach ($AllCompanies as $allcompany)
                                            <option value="{{$allcompany->id}}">{{$allcompany->company_name}} - {{$allcompany->location}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-6 align-self-center">
                                <button type="submit" class="btn btn-primary mt-4">Show Dashboard</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endif

    @switch(Auth::user()->user_type)
        @case('superadmin')
                @include('pages.superadmin.superadmin')
            @break
        @case('admin')
                @include('pages.superadmin.admin')
            @break
        @case('subadmin')
                @include('pages.superadmin.superadmin')
            @break
        @case('employee')
                @include('pages.superadmin.employee')
            @break
        @case('recruiter')
                @include('pages.superadmin.recruiter')
            @break
        @default
            
    @endswitch
@endsection

@section('scripts')
<script src="/assets/vendors/chartjs/Chart.min.js"></script>
<script src="/assets/js/pages/dashboard-default.js"></script>
@endsection