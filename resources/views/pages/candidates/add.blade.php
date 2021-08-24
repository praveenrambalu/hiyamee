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
                                    <span class="text-gray font-weight-semibold">{{$creator->name}}  </span>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4  align-self-center">
                        </div>
                        <div class="col-md-8 align-self-center ">
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#bulkAdd">
                                Bulk Upload Candidates
                            </button>
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
                <h3 class="card-title">Add Candidates</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Candidate Name</label>
                            <input type="text" class="form-control" required placeholder="Ex: John Doe" name="candidate_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Candidate Email</label>
                            <input type="text" class="form-control" required placeholder="Ex: jdoe@example.com" name="candidate_email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Phone No</label>
                            <input type="text" required  class="form-control"  name="candidate_phone" placeholder="Ex : 9876543210">
                        </div>
                       
                    </div>
                
                
                    <button type="submit" class="btn btn-primary">Add Candidate</button>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="bulkAdd">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulkAddTitle">Bulk Candidate</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="/candidates/bulk" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="text-center">
                        <a href="/assets/sample-candidate-form.csv">Download Sample Document</a>
                        <br>
                    </div>
                    <input type="file" name="bulkfile" required  accept=".csv" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
