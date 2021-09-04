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
                <h3 class="card-title" style="float: left;">View Candidates</h3>
                <button class="btn btn-primary float-right"  data-toggle="modal" data-target="#bulkUpdate" style="    margin-top: 10px;">Bulk Status Update</button>
                <a href="/export/candidates" class="btn btn-dark float-right"   style="    margin-top: 10px;">Export Candidates</a>
            </div>
            <form action="/candidates/allocate/update" method="post">
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
                                                @if ($candidate->interview_outcome=='Ready')
                                                    <a href="/candidates/edit/{{$candidate->id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                @else
                                                    <a href="#" onclick="alert('Cannot allowed to edit after interview status updated. !')" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                @endif
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


<div class="modal fade" id="bulkUpdate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulkUpdateTitle">Bulk Update Status</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="/candidates/bulk-status/update" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="text-center">
                        <a href="/assets/sample-application-status.csv">Download Bulk Upload Format here <span class="fa fa-download"></span></a>
                        <br>
                        <br>
                    </div>
                    @csrf
                    <input type="file" name="bulkfile" required  accept=".csv" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
