@extends('layouts.dashboard')
@section('employees','open')
@section('employees-view','active')

@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View Employees</h3>
            </div>
            <div class="card-body">
                <table  class="table datatable dt-responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phoneno</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($employees)>0)
                            @php $i=1; @endphp
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phoneno}}</td>
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
