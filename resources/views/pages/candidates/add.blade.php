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
            <a class="breadcrumb-item" href="/jobs/{{$job->id}}">{{$job->job_title}}</a>
            <span class="breadcrumb-item active">Add Candidate</span>
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
                        <div class="form-group col-md-6">
                            <label >Date of Birth</label>
                            <input type="date" required  class="form-control"  name="dateofbirth" placeholder="Ex : 04/06/1998">
                        </div>
                    </div>
                 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >PAN Card</label>
                            <input type="text" required  class="form-control"  name="pancard" placeholder="Ex : FAQ123456">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Experience</label>
                            <input type="number" step="0.1" min="0" required  class="form-control"  name="experience" placeholder="Ex : 2.5">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Relevent Experience</label>
                            <input type="number" step="0.1" min="0" required  class="form-control"  name="relexperience" placeholder="Ex : 2.5">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Current Company</label>
                            <input type="text"  required  class="form-control"  name="current_company" placeholder="Ex : Apple">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Current CTC</label>
                            <input type="number" step="0.1" min="0" required  class="form-control"  name="current_ctc" placeholder="Ex : 2.5 LPA">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Expected  CTC</label>
                            <input type="number" step="0.1" min="0" required  class="form-control"  name="expected_ctc" placeholder="Ex : 3.0 LPA">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Negotiable  CTC</label>
                            <input type="number" step="0.1" min="0" required  class="form-control"  name="neg_ctc" placeholder="Ex : 2.9 LPA">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Notice Period</label>
                            <input type="number" step="1" min="0" required  class="form-control"  name="notice_period" placeholder="Ex : 30 Days">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Buyout</label>
                            <select name="buyout" id="" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label >Location</label>
                            <input type="text"  required  class="form-control"  name="location" placeholder="Ex : Chennai, India">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Preferred Location</label>
                            <input type="text"  required  class="form-control"  name="prelocation" placeholder="Ex : Mumbai, India">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Resume</label>
                            <input type="file"  required  class="form-control"  name="resume" >
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
            <form action="/candidates/bulk/{{$job->id}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="text-center">
                        <a href="/assets/sample-candidate-form.csv">Download Sample Document</a>
                        <br>
                    </div>
                    @csrf
                    <input type="file" name="bulkfile" required  accept=".csv" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
