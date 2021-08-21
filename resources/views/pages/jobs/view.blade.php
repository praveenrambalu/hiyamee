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
                <h3 class="card-title">View Job Posts</h3>
            </div>
            <div class="card-body">
                <table  class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Role</th>
                            <th>Skills Required</th>
                            <th>Location</th>
                            <th>Annual CTC</th>
                            <th>How Many Places</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($jobs)>0)
                            @php $i=1; @endphp
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><span class="badge badge-danger">{{$job->employment_type}}</span> {{$job->job_title}} </td>
                                    <td><span class="badge badge-dark">{{$job->primary_skill}}</span> {{$job->skills_required}} </td>
                                    <td>{{$job->location}}</td>
                                    <td>{{$job->annual_ctc}}</td>
                                    <td>{{$job->how_many_hires}}</td>
                                    <td>{{$job->status}}</td>
                                    <td>
                                        <a href="#" onclick="alert('Not Implemented')" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                        <a href="#" onclick="alert('Not Implemented')" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                    </td>

                                </tr>
                            @endforeach
                        @endif
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
