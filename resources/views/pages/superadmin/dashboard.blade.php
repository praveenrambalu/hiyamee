@extends('layouts.dashboard')
@section('content')
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
    <div class="col-md-6 col-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="avatar avatar-icon avatar-lg avatar-yellow">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="m-l-15">
                        <h2 class="m-b-0">{{count($totalRecruiters) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Total <br> Recruiters </p>
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
                        <h2 class="m-b-0">{{count($rejectedInterviews) ?? 0}}</h2>
                        <p class="m-b-0 text-muted">Rejected <br> Interviews </p>
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
                    <div class="overflow-y-auto scrollable relative" style="height: 437px">
                        <ul class="timeline p-t-10 p-l-10">
                            @if (count($latestCandidates)>0)
                                @foreach ($latestCandidates as $latest)
                                @php
                                    
                                @endphp
                                <li class="timeline-item">
                                    <div class="timeline-item-head">
                                        @switch($latest->interview_outcome)
                                            @case('Ready')
                                                <div class="avatar avatar-text avatar-sm bg-primary">
                                                </div> 
                                            @break
                                            @case('Interviewed')
                                                <div class="avatar avatar-text avatar-sm bg-warning">
                                                </div> 
                                            @break
                                            @case('Selected')
                                                <div class="avatar avatar-text avatar-sm bg-success">
                                                </div> 
                                            @break
                                            @case('Rejected')
                                                <div class="avatar avatar-text avatar-sm bg-danger">
                                                </div> 
                                            @break
                                        
                                            @default
                                                <div class="avatar avatar-text avatar-sm bg-danger">
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
    <div class="col-md-12 col-lg-8">
        <div class="card">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-center">
                    <h5>Top Product</h5>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                    </div>
                </div>
                <div class="m-t-30">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Sales</th>
                                    <th>Earning</th>
                                    <th style="max-width: 70px">Stock Left</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image rounded">
                                                <img src="/assets/images/others/thumb-9.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <span>Gray Sofa</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>81</td>
                                    <td>$1,912.00</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm w-100 m-b-0">
                                                <div class="progress-bar bg-success" style="width: 82%"></div>
                                            </div>
                                            <div class="m-l-10">
                                                82
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image rounded">
                                                <img src="/assets/images/others/thumb-10.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <span>Gray Sofa</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>26</td>
                                    <td>$1,377.00</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm w-100 m-b-0">
                                                <div class="progress-bar bg-success" style="width: 61%"></div>
                                            </div>
                                            <div class="m-l-10">
                                                61
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image rounded">
                                                <img src="/assets/images/others/thumb-11.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <span>Wooden Rhino</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>71</td>
                                    <td>$9,212.00</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm w-100 m-b-0">
                                                <div class="progress-bar bg-danger" style="width: 23%"></div>
                                            </div>
                                            <div class="m-l-10">
                                                23
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image rounded">
                                                <img src="/assets/images/others/thumb-12.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <span>Red Chair</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>79</td>
                                    <td>$1,298.00</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm w-100 m-b-0">
                                                <div class="progress-bar bg-warning" style="width: 54%"></div>
                                            </div>
                                            <div class="m-l-10">
                                                54
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image rounded">
                                                <img src="/assets/images/others/thumb-13.jpg" alt="">
                                            </div>
                                            <div class="m-l-10">
                                                <span>Wristband</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>60</td>
                                    <td>$7,376.00</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress progress-sm w-100 m-b-0">
                                                <div class="progress-bar bg-success" style="width: 76%"></div>
                                            </div>
                                            <div class="m-l-10">
                                                76
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/assets/vendors/chartjs/Chart.min.js"></script>
<script src="/assets/js/pages/dashboard-default.js"></script>
@endsection