@extends('layouts.dashboard')
@section('jobs','open')
@section('jobs-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/companies">Companies</a>
            <a class="breadcrumb-item" href="/companies/view">View</a>
            <a class="breadcrumb-item" href="/jobs/view/{{$company->id}}">{{$company->company_name}}</a>
            <span class="breadcrumb-item active">{{$job->job_title}}</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 align-self-center">
                            <img class="img-fluid" height="150" width="150" src="{{$company->logo}}" alt="">
                        </div>
                        <div class="col-md-8 align-self-center">
                            <h4 class="m-b-10"><span class="badge badge-default">{{$job->employment_type}}</span> {{$job->job_title}} <span class="badge badge-primary">{{$job->how_many_hires}}</span></h4>
                            <div class="d-flex align-items-center m-t-5 m-b-15">
                                <div class="">
                                    <span class="badge badge-dark">{{$job->primary_skill}}</span> {{$job->skills_required}}
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center m-t-5 m-b-15">
                                <div class="">
                                    <span class="text-gray font-weight-semibold">{{$job->location}}</span>
                                    <span class="m-h-5 text-gray">-</span>
                                    <span class="text-gray">{{$job->annual_ctc}}</span>
                                </div>
                            </div>
                            <p class="m-b-20">{!!$job->description!!}</p>

                            <div class="d-flex align-items-center m-t-5 m-b-15">
                                <div class="">
                                    <span class="text-gray">Posted By </span>
                                    <span class="m-h-5 text-gray">-</span>
                                    <span class="text-gray font-weight-semibold">{{$creator->name}}  </span>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4  align-self-center">
                                <a href="{{$job->feedback}}" target="_blank" class="btn btn-danger">Feedback </a>
                                <a href="{{$job->zoomlink}}" target="_blank" title="{{$job->zoomlink}}" class="btn btn-dark">Meet Link  </a>
                        </div>
                        <div class="col-md-8 align-self-center ">
                            <a href="/candidates/add/{{$job->id}}" target="" class="btn btn-primary">Add Candidates </a>
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
                <h3 class="card-title">View Candidates</h3>
            </div>
            <form action="" method="post">
                @csrf
                <div class="card-body">
                    <table  class="table datatable display dt-responsive nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Application ID</th>
                                <th>-</th>
                                <th>Company</th>
                                <th>Job Detail</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Location</th>
                                <th>Interview Date</th>
                                <th>Interview Time</th>
                                <th>Interview Status</th>
                                {{-- <th>Current CTC</th>
                                <th>Expected CTC</th>
                                <th>Negotiable CTC</th> --}}
                                <th>Uploaded By</th>
                                <th>Uploaded On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($candidates)>0)
                                @php $i=1; @endphp
                                @foreach ($candidates as $candidate)
                                @php
                                    $updater = \App\Models\User::find($candidate->uploaded_by);
                                    $job =  \App\Models\Job::find($candidate->job_id);
                                    $company = \App\Models\Company::find($job->company_id);
                                @endphp
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$candidate->id}}</td>
                                        <td>
                                            @if (Auth::user()->user_type=='admin' || Auth::user()->user_type=='superadmin')
                                                @if ($candidate->allocated_to==null)
                                                    <input type="checkbox" name="candidate[]" value="{{$candidate->id}}" >
                                                @else
                                                    @php
                                                        $allocated = \App\Models\User::find($candidate->allocated_to);
                                                    @endphp
                                                    {{$allocated->name}} <br>
                                                    <small>{{$allocated->email}}</small>
                                                @endif
                                            @endif
    
                                        </td>
                                        <td>
                                            <img src="{{$company->logo ?? ''}}" alt="" class="img img-responsive" style="height:50px; width:50px;">
                                            {{$company->company_name}}
                                        </td>
                                        <td>
                                            {{$job->job_title}}
                                        </td>
                                        <td>{{$candidate->candidate_name}}</td>
                                        <td>{{$candidate->candidate_email}}</td>
                                        <td>{{$candidate->candidate_phone}}</td>
                                        <td>{{$candidate->location}}</td>
                                        <td>{{$candidate->interview_date}}</td>
                                        <td>{{$candidate->interview_time}}</td>
                                        @switch($candidate->interview_outcome)
                                            @case('Ready')
                                                <td><span class="badge badge-pill  badge-blue">Yet to be Interviewed</span></td>
                                                @break
                                            @case('Selected')
                                                <td><span class="badge badge-pill  badge-cyan">{{$candidate->interview_outcome}}</span></td>
                                                @break
                                            @case('Interviewed')
                                                <td><span class="badge badge-pill  badge-orange">{{$candidate->interview_outcome}}</span></td>
                                                @break
                                            @case('Rejected')
                                                <td><span class="badge badge-pill  badge-red">{{$candidate->interview_outcome}}</span></td>
                                                @break
                                            @default
                                            <td></td>
                                        @endswitch
                                        {{-- <td>{{$candidate->current_ctc}}</td>
                                        <td>{{$candidate->expected_ctc}}</td>
                                        <td>{{$candidate->neg_ctc}}</td> --}}
                                        <td>{{$updater->name}}</td>
                                        <td>{{date('Y-m-d', strtotime($candidate->created_at))}}</td>
                                        <td>
                                            <a href="/candidates/{{$candidate->id}}"  class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            @if (Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='admin')
                                              <a href="#" onclick="alert('Not Implemented')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            @endif
                                        </td>
    
                                    </tr>
                                @endforeach
                            @endif
                           
                        </tbody>
                    </table>
    
                    <hr>
    
                    @if (Auth::user()->user_type=='admin' || Auth::user()->user_type=='superadmin')
                        
                    <div class=" row align-items-center">
                        <div class="form-group col-sm-3 align-self-center">
                            <label for="">Allocate to</label>
                            <select name="employee" required class="form-control">
                                @if (count($employees)>0)
                                @foreach ($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->name}} - {{$employee->email}}</option>
                                    @endforeach
                                    @endif
                                </select>
                        </div>
                        <div class="form-group col-sm-3 align-self-center">
                            <label for="">Interview Date</label>
                            <input type="date" name="interview_date" class="form-control" required id="">
                        </div>
                        <div class="form-group col-sm-3 align-self-center">
                            <label for="">Interview Time</label>
                            <input type="time" name="interview_time" class="form-control" required id="">
                        </div>
                        <div class="form-group col-sm-3 align-self-center">
                            <button type="submit" class="btn btn-primary">Allocate </button>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
