@extends('layouts.dashboard')
@section('jobs','open')
@section('jobs-view','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <a class="breadcrumb-item" href="/candidates">Candidates</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>
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
                            <label >Candidate Name <span class="text-danger">*</span>  </label>
                            <input type="text" class="form-control" value="{{$candidate->candidate_name}}" required placeholder="Ex: John Doe" name="candidate_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Candidate Email <span class="text-danger">*</span>  </label>
                            <input type="text" class="form-control" value="{{$candidate->candidate_email}}" required placeholder="Ex: jdoe@example.com" name="candidate_email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Phone No <span class="text-danger">*</span> </label>
                            <input type="text" pattern="^[6-9]\d{9}$" required  value="{{$candidate->candidate_phone}}" class="form-control"  name="candidate_phone" placeholder="Ex : 9876543210">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Date of Birth <span class="text-danger">*</span> </label>
                            <input type="date" required value="{{$candidate->dateofbirth}}"  class="form-control"  name="dateofbirth" placeholder="Ex : 04/06/1998">
                        </div>
                    </div>
                 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >PAN Card <span class="text-danger">*</span> </label>
                            <input type="text" required value="{{$candidate->pancard}}" class="form-control"  name="pancard" placeholder="Ex : FAQ123456">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Gender <span class="text-danger">*</span> </label>
                            <select name="gender" required id=""  class="form-control">
                                <option value="{{$candidate->gender}}">{{$candidate->gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Experience <span class="text-danger">*</span>  </label>
                            <input type="number" value="{{$candidate->experience}}" step="0.1" min="0" required  class="form-control"  name="experience" placeholder="Ex : 2.5">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Relevent Experience <span class="text-danger">*</span> </label>
                            <input type="number" value="{{$candidate->relexperience}}" step="0.1" min="0" required  class="form-control"  name="relexperience" placeholder="Ex : 2.5">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Current Company  </label>
                            <input type="text" value="{{$candidate->current_company}}"   class="form-control"  name="current_company" placeholder="Ex : Apple">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Current CTC  </label>
                            <input type="number" value="{{$candidate->current_ctc}}" step="0.1" min="0"   class="form-control"  name="current_ctc" placeholder="Ex : 2.5 LPA">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Expected  CTC <span class="text-danger">*</span> </label>
                            <input type="number" value="{{$candidate->expected_ctc}}" step="0.1" min="0" required  class="form-control"  name="expected_ctc" placeholder="Ex : 3.0 LPA">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Negotiable  CTC <span class="text-danger">*</span>  </label>
                            <input type="number" value="{{$candidate->neg_ctc}}" step="0.1" min="0" required  class="form-control"  name="neg_ctc" placeholder="Ex : 2.9 LPA">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Notice Period </label>
                            <input type="number" value="{{$candidate->notice_period}}" step="1" min="0"   class="form-control"  name="notice_period" placeholder="Ex : 30 Days">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Buyout <span class="text-danger">*</span> </label>
                            <select name="buyout" id="" required class="form-control">
                                @if ($candidate->buyout=="Yes")
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                @else
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label >Location <span class="text-danger">*</span> </label>
                            <input type="text" value="{{$candidate->location}}" required  class="form-control"  name="location" placeholder="Ex : Chennai, India">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Preferred Location <span class="text-danger">*</span> </label>
                            <input type="text" value="{{$candidate->prelocation}}" required  class="form-control"  name="prelocation" placeholder="Ex : Mumbai, India">
                        </div>
                        <div class="form-group col-md-4">
                            <label >Resume  <a href="{{$candidate->resume}}" download class="btn btn-tune btn-xs ml-3"><span class="fa fa-download"></span></a>  </label>
                            <input type="file"    class="form-control"  name="resume" accept="application/pdf" >
                        </div>
                    </div>


                
                    <button type="submit" class="btn btn-primary">Edit Candidate</button>
                </form>

            </div>
        </div>
    </div>
</div>




@endsection
