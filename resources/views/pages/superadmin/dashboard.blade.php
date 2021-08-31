@extends('layouts.dashboard')
@section('content')
    @switch(Auth::user()->user_type)
        @case('superadmin')
                @include('pages.superadmin.superadmin')
            @break
        @case('admin')
                @include('pages.superadmin.admin')
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