@extends('layouts.dashboard')
@section('jobs','open')
@section('jobs-view','active')

@section('content')
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
                                    <span class="text-gray font-weight-semibold">{{$job_creator->name}}  </span>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4  align-self-center">
                                <a href="{{$job->feedback}}" target="_blank" class="btn btn-danger">Feedback </a>
                                <a href="{{$job->zoomlink}}" target="_blank" title="{{$job->zoomlink}}" class="btn btn-dark">Meet Link  </a>
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
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8 text-center">
                        @switch($candidate->interview_outcome)
                        @case('Ready')
                            <div class="alert alert-primary"><b>Yet to be Interviewed</b></div>
                            @break
                        @case('Selected')
                            <div class="alert alert-success"><b >{{$candidate->interview_outcome}}</b></div>
                            @break
                        @case('Interviewed')
                            <div class="alert alert-warning"><b >{{$candidate->interview_outcome}}</b></div>
                            @break
                        @case('Rejected')
                            <div class="alert alert-rejected"><b >{{$candidate->interview_outcome}}</b></div>
                            @break
                        @default
                        <div></div>
                    @endswitch
                </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="d-md-flex align-items-center">
                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                <h2 class="m-b-5">{{$candidate->candidate_name}} </h2>
                        
                                <p class="text-dark ">{{$job->job_title}} <span class="text-opacity font-size-13">@ {{$company->company_name}}</span></p>
                                

                                <button class="btn btn-primary btn-tone">Status Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <ul class="list-unstyled m-t-10">
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                            <span>Email: </span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{$candidate->candidate_email}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                            <span>Phone: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->candidate_phone}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Location: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->location}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <ul class="list-unstyled m-t-10">
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <span>Uploaded By: </span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{$candidate_creator->name}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <span>Uploaded On: </span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{date('Y-m-d', strtotime($candidate->created_at))}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <span>Location: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->location}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-4">
                        <div class="d-md-flex align-items-center">
                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                <h2 class="m-b-5">Notes</h2>
                                <p class="text-dark ">{{$candidate->notes}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <div class="text-center text-sm-left m-v-15 p-l-30">
                                    <h2 class="m-b-5">Additional Notes</h2>
                                    <p class="text-dark ">{{$candidate->additional_notes}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <div class="text-center text-sm-left m-v-15 p-l-30">
                                    <h2 class="m-b-5">Update History</h2>
                                    <p class="text-dark ">{!!$candidate->update_history!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
