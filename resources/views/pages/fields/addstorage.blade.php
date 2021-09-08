@extends('layouts.dashboard')
@section('fields','open')

@section('content')
<div class="page-header">
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="/dashboard" class="breadcrumb-item"><i class="anticon anticon-dashboard m-r-5"></i>Dashboard</a>
            <span class="breadcrumb-item active">Resumes</span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Resumes</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label >Field Name <small>(No Space Between Words)</small> <span class="text-danger">*</span>  </label>
                            <input type="file" class="form-control" multiple required placeholder="Ex: FieldName" name="resume[]" >
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
                            <th>Src</th>
                        </tr>
                    </thead>
                    <tbody>
                        <pre>
                            {{-- {{$resumes}} --}}
                        </pre>
                        @if (count($resumes)>0)
                            @php $i=1; @endphp
                            @foreach ($resumes as $resume)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $resume['name'] }}</td>
                                    <td>{{ $resume['url'] }}</td>
                                    <td>
                                       <!-- Trigger -->
                                        <button class="btn clipbtn" data-clipboard-text="{{$resume['url']}}">
                                            <i class="far fa-clipboard"></i>
                                        </button>
                                        
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
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script>
var clipboard = new ClipboardJS('.clipbtn');

clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);

    e.clearSelection();
});

clipboard.on('error', function(e) {
    console.error('Action:', e.action);
    console.error('Trigger:', e.trigger);
});
</script>
@endsection