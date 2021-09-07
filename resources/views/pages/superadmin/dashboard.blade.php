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