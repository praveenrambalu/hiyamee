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
                              </select>
                            </div>

                            <div class="form-group col-5">
                                <div class="filter-holder companies d-none" id="filter_companies">
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
                                            <td><span class="badge badge-pill  badge-default">{{$candidate->interview_outcome}}</span></td>
                                        @endswitch
                                        <td>
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
                                        <td>{{$candidate->interview_date}}</td>
                                        <td>{{$candidate->interview_time}}</td>
                                        
                                        {{-- <td>{{$candidate->current_ctc}}</td>
                                        <td>{{$candidate->expected_ctc}}</td>
                                        <td>{{$candidate->neg_ctc}}</td> --}}
                                        <td>{{$updater->name}}</td>
                                        <td>{{date('Y-m-d', strtotime($candidate->created_at))}}</td>
                                        <td>
                                            <a href="/candidates/{{$candidate->id}}"  class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            @if (Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='admin' || Auth::user()->user_type=='subadmin')
                                              {{-- <a href="#" onclick="swal('Not Implemented')" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                                                @if ($candidate->interview_outcome=='Ready')
                                                    <a href="/candidates/edit/{{$candidate->id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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
            $("#filter_companies").addClass('d-none')
            $("#filter_type").change(function(){
                var filter_type = $(this).val()
                
                switch (filter_type) {
                    case 'filter_companies':
                        $("#filter_companies").removeClass('d-none')
                        break;
                
                    default:
                        filter_fun('')
                        $("#filter_companies").addClass('d-none')
                        break;
                }


            });
        })

    </script>
    <script>
        $(document).ready(function(){
            $("#companies_filter").change(function(){
                var filter_val = $(this).val()
                filter_fun(filter_val)
            });
        })

        function filter_fun(filter_val) {
                $("input[type='search']").val(filter_val)
                $("input[type='search']").trigger('keyup')
        }
    </script>

@endsection
