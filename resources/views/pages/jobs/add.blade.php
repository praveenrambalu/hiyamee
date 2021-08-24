@extends('layouts.dashboard')
@section('jobs','open')
@section('jobs-add','active')

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
                            <h4 class="m-b-10">{{$company->company_name}}</h4>
                            <div class="d-flex align-items-center m-t-5 m-b-15">
                                <div class="">
                                    <span class="text-gray font-weight-semibold">{{$company->location}}</span>
                                    <span class="m-h-5 text-gray">-</span>
                                    <span class="text-gray">{{$company->pincode}}</span>
                                </div>
                            </div>
                            <p class="m-b-20">{!!$company->description!!}</p>
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
                <h3 class="card-title">Add Job Role</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Employment Type</label>
                            <select name="employment_type" id="" required class="form-control">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Job Title</label>
                            <input type="text" class="form-control" required placeholder="Ex: MERN Stack Developer" name="job_title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Location</label>
                            <input type="text" required  class="form-control"  name="location" placeholder="Ex : Chennai, Tamilnadu">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Primary Skill</label>
                            <input type="text" required  class="form-control"  placeholder="Ex: Node JS" name="primary_skill">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Skills Required </label>
                            <input type="text" required class="form-control"  placeholder="Ex: MongoDB,NodeJS,ReactJs" name="skills_required">
                        </div>
                        <div class="form-group col-md-6">
                            <label >How many openings</label>
                            <input type="number" required class="form-control"  placeholder="Ex: 2" min="1" name="how_many_hires">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Annual CTC</label>
                            <input type="text" required class="form-control"  placeholder="Ex: 3.2 LPA" name="annual_ctc">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Zoom link</label>
                            <input type="text" required class="form-control"  placeholder="Ex: https://us04web.zoom.us/j/123456789" name="zoomlink">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Feedback</label>
                            <br>
                            <br>
                            <label for="linkorfilelink" class="mr-3"><input type="radio" checked name="linkorfile" value="link" id="linkorfilelink"> Link</label>
                            <label for="linkorfilefile" class="mr-3"><input type="radio" name="linkorfile" value="file" id="linkorfilefile"> File</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Feedback </label>
                            <div id="linkorfile">
                            </div>
                        </div>
                    </div>
                 
                    <div class="form-group ">
                        <label >Description</label>
                        <textarea type="text" class="form-control ckeditor" required name="description"></textarea>
                        
                    </div>
                
                    <button type="submit" class="btn btn-primary">Add Job</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            linkorfilecheck();
            $("#linkorfilelink").change(function(){
                linkorfilecheck();
            });
            $("#linkorfilefile").change(function(){
                linkorfilecheck();
            });

            function linkorfilecheck() {
               var value = $('input[name="linkorfile"]:checked').val();
               if(value==='file'){
                $("#linkorfile").html('<input type="file" name="feedback" required  class="form-control">');
               }else{
                $("#linkorfile").html('<input type="url" name="feedback" required  class="form-control">');
               }
            }

        })
    </script>
@endsection