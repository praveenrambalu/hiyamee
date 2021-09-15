@extends('layouts.dashboard')
@section('jobs','open')
@section('jobs-add','active')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Jobs</span>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Job Role</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Employment Type <span class="text-danger">*</span> </label>
                            <select name="employment_type" id="" required class="form-control">
                                <option value="{{$job->employment_type}}">{{$job->employment_type}}</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Job Title <span class="text-danger">*</span> </label>
                            <input type="text" value="{{$job->job_title}}" class="form-control" required placeholder="Ex: MERN Stack Developer" name="job_title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Location <span class="text-danger">*</span>  </label>
                            <input type="text" value="{{$job->location}}"  required  class="form-control"  name="location" placeholder="Ex : Chennai, Tamilnadu">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Primary Skill <span class="text-danger">*</span> </label>
                            <input type="text" value="{{$job->primary_skill}}"  required  class="form-control"  placeholder="Ex: Node JS" name="primary_skill">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Skills Required <span class="text-danger">*</span>  </label>
                            <input type="text" value="{{$job->skills_required}}" required class="form-control"  placeholder="Ex: MongoDB,NodeJS,ReactJs" name="skills_required">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Openings <span class="text-danger">*</span> </label>
                            <input type="number" value="{{$job->how_many_hires}}" required class="form-control"  placeholder="Ex: 2" min="1" name="how_many_hires">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Annual CTC <span class="text-danger">*</span> </label>
                            <input type="text" value="{{$job->annual_ctc}}" required class="form-control"  placeholder="Ex: 3.2 LPA" name="annual_ctc">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Link </label>
                            <input type="url" value="{{$job->zoomlink}}"  class="form-control"  placeholder="Ex: https://us04web.zoom.us/j/123456789" name="zoomlink">
                        </div>
                    </div>
                 
                    <div class="form-group ">
                        <label >Description <span class="text-danger">*</span> </label>
                        <textarea type="text"  class="form-control ckeditor" required name="description">{{$job->description}}</textarea>
                        
                    </div>

                    {{-- <div class="form-row">
                        <div class="form-group col-md-12">
                            <label >Additional Fields</label>
                            <br>
                            @if (count($fields)>0)
                                @foreach ($fields as $field)
                                    @php
                                        
                                        $datafield = \App\Models\FieldList::where('field_id',$field->id)->where('job_id',$job->id)->first();
                                    @endphp
                                    @if ($datafield)
                                    <label for="{{$field->name}}" class="mr-3"> <input type="checkbox" name="additional_fields[]" value="{{$field->id}}" id="{{$field->name}}" checked>   {{$field->name}} ({{$field->type}})   </label>
                                    @else
                                    <label for="{{$field->name}}" class="mr-3"> <input type="checkbox" name="additional_fields[]" value="{{$field->id}}" id="{{$field->name}}">   {{$field->name}} ({{$field->type}})   </label>
                                    @endif
                                    
                                @endforeach
                            @else
                                <div class="alert alert-warning">
                                    <b>No additional Fields added please contact admin to add a additional fields.</b>
                                </div>
                            @endif
                        </div>
                    </div> --}}
                
                    <button type="submit" class="btn btn-primary">Update Job</button>
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