@extends('layouts.dashboard')
@section('candidates','open')
@section('candidates-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Candidates</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View Candidates</h3>
            </div>
            <div class="card-body">
                <table  class="table datatable display dt-responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Application ID</th>
                            <th>Interview Status</th>
                            <th>Scheduled To</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Job Detail</th>
                            <th>Company</th>
                            <th>Location</th>
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
                                    <td>{{$candidate->candidate_name}}</td>
                                    <td>{{$candidate->candidate_email}}</td>
                                    <td>{{$candidate->candidate_phone}}</td>
                                    <td>
                                        {{$job->job_title}}
                                    </td>
                                    <td>
                                        <img src="{{$company->logo ?? ''}}" alt="" class="img img-responsive" style="height:50px; width:50px;">
                                        {{$company->company_name}}
                                    </td>
                                 
                                   
                                    <td>{{$candidate->location}}</td>
                                 
                                    {{-- <td>{{$candidate->current_ctc}}</td>
                                    <td>{{$candidate->expected_ctc}}</td>
                                    <td>{{$candidate->neg_ctc}}</td> --}}
                                    <td>{{$updater->name}}</td>
                                    <td>{{date('Y-m-d', strtotime($candidate->created_at))}}</td>
                                    <td>
                                        <a href="/candidates/{{$candidate->id}}"  class="btn btn-primary"><i class="fas fa-eye"></i></a>
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
