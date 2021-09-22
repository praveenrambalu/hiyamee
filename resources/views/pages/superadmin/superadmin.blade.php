<div class="row">
    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($completedInterviews) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Interviews Completed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-gold">
                        <i class="anticon anticon-profile"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($remainingInterviews) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Interviews Remaining </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='admin' || Auth::user()->user_type=='subadmin')
  
    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-cyan">
                        <i class="anticon anticon-user"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($totalCandidates) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Total <br> Candidates </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
        <div class="col-md-6 col-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-yellow">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{count($totalRecruiters) ?? 0}}</h2>
                            @if (Auth::user()->user_type=='superadmin' || Auth::user()->user_type=='subadmin')
                            <p class="m-b-0 text-muted">Total <br> Recruiters </p>
                            @else
                            <p class="m-b-0 text-muted">Total <br> Employees </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endif
 
    @if (Auth::user()->user_type=='superadmin')
        <div class="col-md-6 col-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{count($totalCompanies) ?? 0}}</h2>
                            <p class="m-b-0 text-muted">Total <br> Companies </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-red">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($rejectedInterviews) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Rejected <br> Interviews </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-green">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($selectedInterviews) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Selected <br> Interviews </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-blue">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($NoOfJobs) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">No. Of  <br> Jobs </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-green">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($ActiveJobs) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Active  <br> Jobs </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-red">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($InActiveJobs) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">In Active  <br> Jobs </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-cyan">
                        <i class="fas fa-smile"></i>
                    </div>
                    <div class="m-l-15">
                        @if (count($totalCandidates)>0)
                            @if (count($selectedInterviews)>0)
                            <h2 class="m-b-0">{{ number_format(count($selectedInterviews)/count($totalCandidates)*100 ,2) ?? 0}} %</h2>
                                
                            @endif
                        @endif
                        <p class="m-b-0 text-muted">Conversion Ratio  <br> <br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


</div>
<div class="row">
    
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-b-0">Latest Upload</h5>
                </div>
                <div class="m-t-30">
                    <div class="overflow-y-auto scrollable relative" >
                        <ul class="timeline p-t-10 p-l-10">
                            @if (count($latestCandidates)>0)
                                @foreach ($latestCandidates as $latest)
                                @php
                                    
                                @endphp
                                <li class="timeline-item">
                                    <div class="timeline-item-head">
                                        @switch($latest->interview_outcome)
                                            @case('Ready')
                                            <div class="avatar avatar-icon bg-white">
                                                <i class="fas fa-list font-size-22 text-primary"></i>
                                            </div>
                                            @break
                                            @case('Interviewed')
                                                <div class="avatar avatar-icon bg-white">
                                                    <i class="anticon anticon-message font-size-22 text-primary"></i>
                                                </div>
                                            @break
                                            @case('Selected')
                                                <div class="avatar avatar-icon bg-white">
                                                    <i class="anticon anticon-check font-size-22 text-success"></i>
                                                </div>
                                            @break
                                            @case('Rejected')
                                                <div class="avatar avatar-icon bg-white">
                                                    <i class="anticon anticon-close-circle font-size-22 text-danger"></i>
                                                </div>
                                            @break
                                        
                                            @default
                                            <div class="avatar avatar-icon bg-white">
                                                <i class="anticon anticon-message font-size-22 text-primary"></i>
                                            </div>
                                        @endswitch
                                                                                                       
                                    </div>
                                    <div class="timeline-item-content">
                                        <div class="m-l-10">
                                            <h5 class="m-b-5">{{$latest->candidate_name}}</h5>
                                            <p class="m-b-0">
                                                <span class="font-weight-semibold">{{$latest->job_position}} </span> 
                                                <span class="m-l-5"> {{$latest->job_company}}</span>
                                            </p>
                                            {{-- <span class="text-muted font-size-13">
                                                <span class="m-l-5">10:44 PM</span>
                                            </span> --}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @endif
                           
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->user_type=='superadmin'  || Auth::user()->user_type=='subadmin')
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Recently Added Companies</h5>
                </div>
                <div class="m-t-30">
                    <ul class="list-group list-group-flush">

                        @if (count($Companies)>0)
                            @foreach ($Companies as $company)
                            @php
                                $overallcandidates = \App\Models\Candidate::where('status', 'active')->where('company_id',$company->id)->get();
                                $selectedoverallcandidates = \App\Models\Candidate::where('status', 'active')->where('company_id',$company->id)->where('interview_outcome','Selected')->get();
                            @endphp
                            <li class="list-group-item p-h-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex">
                                        <div class="avatar avatar-image m-r-15">
                                            <img src="{{$company->logo}}" alt="">
                                        </div>
                                        <div>
                                            <h6 class="m-b-0">
                                                <a href="javascript:void(0);" class="text-dark"> {{$company->company_name}}</a>
                                            </h6>
                                            <span class="text-muted font-size-13">{{$company->industry}}</span>
                                        </div>
                                    </div>
                                    <span class="badge badge-pill badge-cyan font-size-12">
                                        <span class="font-weight-semibold ">
                                            @if (count($overallcandidates)!=0)
                                                {{ number_format(count($selectedoverallcandidates) / count($overallcandidates) * 100,2) ?? '0.00'}}
                                            @else
                                                0.00
                                            @endif %
                                        </span>
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        @endif


                      
                      
                    </ul> 
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-center">
                    <h5>Recent  Jobs</h5>
                </div>
                <div class="m-t-30">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Location</th>
                                    <th>Applications</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($latestjobs)>0)
                                @foreach ($latestjobs as $job)
                                        @php
                                            $company = \App\Models\Company::find($job->company_id);
                                            $applications = \App\Models\Candidate::where('status', 'active')->where('job_id',$job->id)->get();
                                        @endphp
                                    <tr>
                                        <td>
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-image rounded">
                                                    <img src="{{$company->logo}}"  alt="">
                                                </div>
                                                <div class="m-l-10">
                                                    <span>{{$job->job_title}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$job->location}}</td>
                                        <td>{{count($applications)}}</td>
                                    </tr>
                                    @endforeach
                                @endif
                              
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>