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
            <div class="card-body">
                <form action="" method="get" id="filterform">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Filter by Interview Date</h4>
                                <hr>
                            </div>
                            <div class="form-group col-5">
                              <label for="">From Date</label>
                              <input type="date" name="from_date" id="from_date" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group col-5">
                              <label for="">To Date</label>
                              <input type="date" name="to_date" id="to_date" class="form-control" placeholder="" aria-describedby="helpId">
                                <p class="text-danger" id="filter-error"></p>
                            </div>
                            <div class="form-group col-2">
                                <button type="button" id="filterbtn" class="btn btn-primary mt-4">Filter</button>
                                @if (isset($_GET['from_date']))
                                <a href="/candidates" class="btn btn-danger mt-4">Clear Filter</a>
                                @endif
                            </div>
                            
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                              <label for="">Filter By</label>
                              <select  id="filter_type" class="form-control">
                                  <option value="">None</option>
                                  <option value="filter_companies">Companies</option>
                                  <option value="filter_jobs">Jobs</option>
                                  <option value="filter_users">Recruiters / Employees </option>
                                  <option value="filter_status">Interview Status</option>
                                  <option value="filter_upload">Upload Date</option>
                                  {{-- <option value="filter_experience">Experience</option> --}}
                              </select>
                            </div>

                            <div class="form-group col-5">
                                <div class="filter-holder  d-none" id="filter_companies">
                                    <label for="">Companies</label>
                                    @if (count($filterCompanies)>0)
                                        <select  id="companies_filter" class="form-control">
                                            <option value="">-</option>
                                            @foreach ($filterCompanies as $filterCompany)
                                                <option value="{{$filterCompany->company_name}}">{{$filterCompany->company_name}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="filter-holder  d-none" id="filter_jobs">
                                    <label for="">Jobs</label>
                                    @if (count($filterJobs)>0)
                                        <select  id="jobs_filter" class="form-control">
                                            <option value="">-</option>
                                            @foreach ($filterJobs as $filterJob)
                                                <option value="{{$filterJob->job_title}}">{{$filterJob->job_title}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="filter-holder  d-none" id="filter_users">
                                    <label for="">Users</label>
                                    @if (count($filterUsers)>0)
                                        <select  id="users_filter" class="form-control">
                                            <option value="">-</option>
                                            @foreach ($filterUsers as $filterUser)
                                                <option value="{{$filterUser->email}}">{{$filterUser->name}} - {{$filterUser->email}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="filter-holder  d-none" id="filter_status">
                                    <label for="">Status</label>
                                        <select  id="status_filter" class="form-control">
                                            <option value="">-</option>
                                            <option value="Yet to be Interviewed">Yet to be Interviewed</option>
                                            <option value="Interviewed">Interviewed</option>
                                            <option value="Feedback pending">Feedback pending</option>
                                            <option value="Selected">Selected</option>
                                            <option value="Rejected">Rejected</option>
                                            <option value="Not Interested">Not Interested</option>
                                            
                                        </select>
                                </div>
                                <div class="filter-holder  d-none" id="filter_experience">
                                    <label for="">Experience</label>
                                        <input type="number" name="" min="0" max="50" step="0.1" id="experience_filter" class="form-control">
                                </div>
                                <div class="filter-holder  d-none" id="filter_upload">
                                    <label for="">Upload Date</label>
                                        <input type="date" id="upload_filter" class="form-control">
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
                                <th>Interview Status</th>
                                <th>Assigned to</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Job Detail</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Interview Date</th>
                                <th>Interview Time</th>
                                <th>Experience</th>
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
                                
                                    <tr data-url="/candidates/{{$candidate->id}}">
                                        
                                        <td>{{$i++}}</td>
                                        <td class="urlclicker">{{$candidate->id}}</td>
                                        @switch($candidate->interview_outcome)
                                            @case('Ready')
                                                <td class="urlclicker"><span class="badge badge-pill  badge-blue">Yet to be Interviewed</span></td>
                                                @break
                                            @case('Selected')
                                                <td class="urlclicker"><span class="badge badge-pill  badge-cyan">{{$candidate->interview_outcome}}</span></td>
                                                @break
                                            @case('Interviewed')
                                                <td class="urlclicker"><span class="badge badge-pill  badge-orange">{{$candidate->interview_outcome}}</span></td>
                                                @break
                                            @case('Rejected')
                                                <td class="urlclicker"><span class="badge badge-pill  badge-red">{{$candidate->interview_outcome}}</span></td>
                                                @break
                                            @default
                                            <td class="urlclicker"><span class="badge badge-pill  badge-default">{{$candidate->interview_outcome}}</span></td>
                                        @endswitch
                                        <td class="urlclicker">
                                            @if (Auth::user()->user_type=='admin' || Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='subadmin')
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
                                        <td class="urlclicker">{{$candidate->candidate_name}}</td>
                                        <td class="urlclicker">{{$candidate->candidate_email}}</td>
                                        <td class="urlclicker">{{$candidate->candidate_phone}}</td>
                                        <td class="urlclicker">
                                            {{$job->job_title}}
                                        </td>
                                        <td class="urlclicker">
                                            <img src="{{$company->logo ?? ''}}" alt="" class="img img-responsive" style="height:50px; width:50px;">
                                            {{$company->company_name}}
                                        </td>
                                      
                                      
                                        <td class="urlclicker">{{$candidate->location}}</td>
                                        <td class="urlclicker">{{$candidate->interview_date}}</td>
                                        <td class="urlclicker">{{$candidate->interview_time}}</td>
                                        <td class="urlclicker">Experience-{{$candidate->experience}}
                                            Relevent-{{$candidate->relexperience}}
                                        </td>
                                        
                                        {{-- <td>{{$candidate->current_ctc}}</td>
                                        <td>{{$candidate->expected_ctc}}</td>
                                        <td>{{$candidate->neg_ctc}}</td> --}}
                                        <td class="urlclicker">{{$updater->name}}</td>
                                        <td class="urlclicker">{{date('Y-m-d', strtotime($candidate->created_at))}}</td>
                                        <td>
                                            <a href="/candidates/{{$candidate->id}}"  class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            @if (Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='admin' || Auth::user()->user_type=='subadmin')
                                             
                                                
                                                @if ($candidate->interview_outcome=='Ready')
                                                <a href="/candidates/edit/{{$candidate->id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                    @if (Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='subadmin')
                                                        @if ($candidate->interview_outcome=='Ready')
                                                         <a href="/candidates/delete/{{$candidate->id}}"  class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        @endif
                                                    @endif
                                                @else
                                                    <button type="button"  onclick="swal('','Cannot allowed to edit after interview status updated','error')" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                @endif
                                            @endif
                                        </td>
    
                                    </tr>
                                @endforeach
                            @endif
                           
                        </tbody>
                    </table>
    
                    <hr>
    
                    @if (Auth::user()->user_type=='admin' || Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='subadmin')
                        
                    <div class=" row align-items-center">
                        <div class="form-group col-sm-3 align-self-center">
                            <label for="">Scheduled to</label>
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

@section('scripts')
    <script>
        $(document).ready(function(){
           $("#filterbtn").click(function(){
               var from_date = $("#from_date").val();
               var to_date = $("#to_date").val();
                if (from_date != "" && to_date!="") {
                    var date1 = new Date(from_date);
                    var date2 = new Date(to_date);

                    // To calculate the time difference of two dates
                    var Difference_In_Time = date2.getTime() - date1.getTime();

                    // To calculate the no. of days between two dates
                    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

                    if (Difference_In_Days > 0) {
                        $("#filterform").submit()
                    }else{
                        $("#filter-error").hide();
                        $("#filter-error").text('Please select valid date');
                        $("#filter-error").show(1000);
                        setTimeout(() => {
                            $("#filter-error").hide(1000);
                            $("#filter-error").text('');
                            $("#filter-error").show();
                        }, 3000);
                    }
                }

           });
        });
    </script>

    <script>
        $(document).ready(function(){
           
            $("#filter_type").change(function(){
                $("#filter_companies").addClass('d-none')
                $("#filter_jobs").addClass('d-none')
                $("#filter_users").addClass('d-none')
                $("#filter_status").addClass('d-none')
                $("#filter_experience").addClass('d-none')
                $("#filter_upload").addClass('d-none')
                var filter_type = $(this).val()
                
                switch (filter_type) {
                    case 'filter_companies':
                        $("#filter_companies").removeClass('d-none')
                        break;
                    case 'filter_jobs':
                        $("#filter_jobs").removeClass('d-none')
                        break;
                    case 'filter_users':
                        $("#filter_users").removeClass('d-none')
                        break;
                    case 'filter_status':
                        $("#filter_status").removeClass('d-none')
                        break;
                    case 'filter_experience':
                        $("#filter_experience").removeClass('d-none')
                        break;
                    case 'filter_upload':
                        $("#filter_upload").removeClass('d-none')
                        break;
                
                    default:
                        filter_fun('')
                        $("#filter_companies").addClass('d-none')
                        $("#filter_jobs").addClass('d-none')
                        $("#filter_users").addClass('d-none')
                        $("#filter_status").addClass('d-none')
                        $("#filter_experience").addClass('d-none')
                        $("#filter_upload").addClass('d-none')
                        break;
                }


            });
        })

    </script>
    <script>
        $(document).ready(function(){
            $("#companies_filter,#jobs_filter,#users_filter,#status_filter,#upload_filter").change(function(){
                var filter_val = $(this).val()
                $("input[type='search']").val(filter_val)
                $("input[type='search']").trigger('keyup')
            });
            $("#experience_filter").change(function(){
                var filter_val = $(this).val()
                $("input[type='search']").val('Experience-'+filter_val)
                $("input[type='search']").trigger('keyup')
            })
           
        })


        
    </script>

@endsection
