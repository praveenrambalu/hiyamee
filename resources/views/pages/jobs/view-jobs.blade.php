@extends('layouts.dashboard')
@section('jobs','open')
@section('jobs','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            
            <span class="breadcrumb-item active" >Jobs</span>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="float: left;">View Job Posts</h3>
            </div>
            <div class="card-body">
                <table  class="table datatable dt-responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Job Role</th>
                            <th>Skills Required</th>
                            <th>Location</th>
                            <th>Annual CTC</th>
                            <th> Openings</th>
                            <th> Experience Required</th>
                            <th> Created At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($jobs)>0)
                            @php $i=1; @endphp
                            @foreach ($jobs as $job)
                            @php $company = \App\Models\Company::find($job->company_id) @endphp
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{$company->logo}}" class="img img-responsive" style="height:50px; width:50px; border-radius:50%;" alt="{{$company->company_name}} Logo">  {{$company->company_name}}  </td>
                                    <td><span class="badge badge-danger">{{$job->employment_type}}</span> {{$job->job_title}} </td>
                                    <td><span class="badge badge-dark">{{$job->primary_skill}}</span> {{$job->skills_required}} </td>
                                    <td>{{$job->location}}</td>
                                    <td>{{$job->annual_ctc}}</td>
                                    <td>{{$job->how_many_hires}}</td>
                                    <td>{{$job->experience_required}}</td>
                                    <td>{{date("Y-m-d", strtotime($job->created_at))}}</td>
                                    <td>{{$job->status}}</td>
                                    <td>
                                        <a href="/jobs/{{$job->id}}"  class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                        @if (Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='admin')
                                        <a href="/jobs/edit/{{$job->id}}"  class="btn btn-warning" title="Edit Job"><i class="fas fa-edit"></i></a>
                                        {{-- <a href="#" onclick="alert('Not Implemented')" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
