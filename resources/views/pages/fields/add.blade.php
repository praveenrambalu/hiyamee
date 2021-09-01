@extends('layouts.dashboard')
@section('fields','open')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Fields</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Fields</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Field Name <small>(No Space Between Words)</small></label>
                            <input type="text" class="form-control" required placeholder="Ex: FieldName" name="name" pattern="^[a-zA-Z]*$">
                        </div>
                        <div class="form-group col-md-6">
                            <label >Field Type</label>
                            <select name="type" id="" required class="form-control">
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                            </select>
                        </div>
                        
                    </div>
                 
                
                    <button type="submit" class="btn btn-primary">Add Field</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View Fields</h3>
            </div>
            <div class="card-body">
                <table  class="table datatable dt-responsive nowrap" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($fields)>0)
                            @php $i=1; @endphp
                            @foreach ($fields as $field)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$field->name}}</td>
                                    <td>{{$field->type}}</td>
                                    {{-- <td>
                                        <a href="/candidates/view/{{$employee->id}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </td> --}}
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
