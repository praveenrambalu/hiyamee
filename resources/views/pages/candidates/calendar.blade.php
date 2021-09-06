@extends('layouts.dashboard')
@section('calendar','open')
@section('calendar-view','active')

@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                   
                    <div id='calendar'></div>
                   </div>
            </div>
        </div>
    </div>
</div>






@endsection
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js" ></script>
<script>
$("document").ready(function(){
    var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
          // initialView: 'timeGridWeek',
          timeZone: 'local',
          events: '/calfeed',
          eventColor: '#378006',
            eventClick: function(info) {
            info.jsEvent.preventDefault(); // don't let the browser navigate
            if (info.event.url) {
            window.open(info.event.url);
            }
            }
        });
        calendar.render();
});
  </script>

@endsection
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css"  />
@endsection