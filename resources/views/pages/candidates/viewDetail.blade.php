@extends('layouts.dashboard')
@section('jobs','open')
@section('jobs-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/candidates">Candidates</a>

            <span class="breadcrumb-item active">Detail</span>
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
                                    <span class="text-gray font-weight-semibold">{{$job_creator->name}}  </span>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row d-none">
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
                                <h2 class="m-b-5">{{$candidate->candidate_name}} 
                                 <small><small>   @switch($candidate->gender)
                                    @case('Male')
                                            <span class="badge badge-primary">{{$candidate->gender}}</span>
                                        @break
                                    @case('Female')
                                            <span class="badge badge-dark">{{$candidate->gender}}</span>
                                        @break
                                
                                    @default
                                    <span class="badge badge-default">{{$candidate->gender}}</span>
                                @endswitch</small></small>
                                </h2>
                        
                                <p class="text-dark ">{{$job->job_title}} <span class="text-opacity font-size-13">@ {{$company->company_name}}</span></p>
                                
                                    <button class="btn btn-primary btn-tone" type="button" data-toggle="modal" data-target="#InterViewStatus">Status Update</button>
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
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-area-chart"></i>
                                            <span>Experience: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->experience}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary fas fa-signal"></i>
                                            <span>RExperience: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->relexperience}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary fas fa-money-check-alt"></i>
                                            <span>Current CTC: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->current_ctc}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary fas fa-money-bill-wave"></i>
                                            <span>E CTC: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->expected_ctc}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary fas fa-money-bill"></i>
                                            <span>N CTC: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->neg_ctc}}</p>
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
                                            <span>Current Company : </span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{$candidate->current_company ?? ''}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <span>Notice Period : </span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{$candidate->notice_period ?? ''}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                            <span>Interviewer : </span> 
                                        </p>
                                        <p class="col font-weight-semibold">{{$interviewer->name ?? ''}}</p>
                                    </li>
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
                                            <span>Current Location: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->location}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <span>Preferred Location: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->prelocation}}</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                            <span>Buyout: </span> 
                                        </p>
                                        <p class="col font-weight-semibold"> {{$candidate->buyout}}</p>
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
                                <p class="text-dark ">{!!$candidate->notes!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="d-md-block d-none border-left col-1"></div>
                            <div class="col">
                                <div class="text-center text-sm-left m-v-15 p-l-30">
                                    <h2 class="m-b-5">Additional Notes</h2>
                                    <p class="text-dark ">{!!$candidate->additional_notes!!}</p>
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

@if (count($fielddatas)>0)
    
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="d-md-flex align-items-center">
                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                <h2 class="m-b-5">Additional Fields</h2>
                            </div>
                        </div>
                    </div>
                    @foreach ($fielddatas as $fielddata)
                        <div class="col-md-4">
                            <div class="d-md-flex align-items-center">
                                <div class="text-center text-sm-left m-v-15 p-l-30">
                                    <p class="text-dark"> <b class="mr-3">{{$fielddata->field_name}} : </b> {{$fielddata->field_value}} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
               
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endif



<div class="modal fade" id="InterViewStatus">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="InterViewStatusTitle">Candidate Status Update</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">Interview Outcome</label>
                            <input type="hidden" name="id" value="{{$candidate->id}}" id="">
                            <select type="text" name="interview_outcome" id="" class="form-control">
                                <option value="Ready">Ready</option>
                                <option value="Interviewed">Interviewed</option>
                                <option value="Selected">Selected</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Current Location</label>
                            <input type="text" name="location" id="" value="{{$candidate->location}}" required class="form-control">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Preferred Location</label>
                            <input type="text" name="prelocation" id="" value="{{$candidate->prelocation}}" required class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">Current Company</label>
                            <input type="text" name="current_company"  value="{{$candidate->current_company}}" id=""  class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">Current CTC</label>
                            <input type="text" name="current_ctc"  value="{{$candidate->current_ctc}}" id="" required class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">Expected CTC</label>
                            <input type="text" name="expected_ctc"  value="{{$candidate->expected_ctc}}" id="" required class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">Negotiable CTC</label>
                            <input type="text" name="neg_ctc"  value="{{$candidate->neg_ctc}}" id="" required class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">Notice Period</label>
                            <input type="text" name="notice_period"  value="{{$candidate->notice_period}}" id="" required class="form-control">
                        </div>
                      
                      
                        <div class="form-group col-sm-3">
                            <label for="">Total Experience</label>
                            <input type="number" name="experience"  value="{{$candidate->experience}}" id="" required step="0.1" min="0" max="50" class="form-control">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="">Relevent Experience</label>
                            <input type="number" name="relexperience"  value="{{$candidate->relexperience}}" id="" required step="0.1" min="0" max="50" class="form-control">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="">Buyout</label>
                            <select name="buyout" id="" class="form-control">
                                <option value="{{$candidate->buyout}}">{{$candidate->buyout}}</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        @if (count($addfields)>0)
                            @foreach ($addfields as $addfield)
                                <div class="form-group col-sm-6">
                                    <label for="">{{$addfield->field_name}}</label>
                                    <input type="{{$addfield->field_type}}" name="{{$addfield->field_name}}"   class="form-control">
                                </div>
                            @endforeach
                        @endif


                        <div class="form-group col-sm-6">
                            <label for="">Notes</label>
                            <textarea type="text" name="notes" id="" required class="form-control"></textarea>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Additional Notes</label>
                            <textarea type="text" name="additional_notes" id="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
