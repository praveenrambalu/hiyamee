@if (count($jobs)>0)
    <option value="">-</option>
@foreach ($jobs as $job)
    <option value="{{$job->id}}">{{$job->job_title}}</option>
@endforeach
@endif