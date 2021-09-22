<div class="row">
    <div class="col-md-6 col-lg-3">
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
    <div class="col-md-6 col-lg-3">
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
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-red">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($rejectedInterviews) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Rejected Interviews </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-green">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($selectedInterviews) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Selected  Interviews </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    
    <div class="col-md-12 col-lg-6">
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
  

    <div class="col-md-12 col-lg-6">
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
                                    <th>App</th>
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