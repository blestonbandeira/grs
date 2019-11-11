@extends('layouts.app')

@section('content')
<input type="hidden" value="calendarClass" class="navLiSelect">


<div class="container" style="margin-left: 10vw;margin-top:-10px;">
   <div id="calendar" style="width: 55vw!important;"></div>
</div>

<button id="btnModalShow" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEventsShow" style="visibility: hidden;"></button>

<div class="modal fade" id="modalEventsShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <input type="hidden" id="idEvent">
    <div id="modalEvents" class="modal-content">
      
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script>
    var allEvents;
    $.ajax({
        dataType: "json",
        url:"/api/events",
        type:"GET",
        data:{id_user:1, id_event_type:null},
        success:function(data)
        {
            allEvents = data;
            var calendar = $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                slotDuration: '00:15:00',
                slotLabelInterval: 15,
                slotMinutes: 15,
                timeFormat: 'HH:mm',
                minTime: "09:00:00",
                maxTime: "19:00:00",
                allDaySlot: false,
                weekends: false,
                height: 550,
                editable:false,
                selectable:false,
                plugins: [ 'bootstrap' ],
                themeSystem: 'bootstrap',
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: allEvents,
                selectHelper:true,
                eventClick:function(event)
                { 
                  document.getElementById('idEvent').value = event.id;
                  var start = $.fullCalendar.formatDate(event.start, "HH:mm:ss");
                  var end = $.fullCalendar.formatDate(event.end, "HH:mm:ss");
                  var date = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                  var typeEvent;
                  if (event.type === "interview")
                    typeEvent="Entrevista";
                  else if (event.type === "cursoNA")
                    typeEvent="Prova de Aferição";
                  else if (event.type === "cursoA")
                    typeEvent="Inventário Vocacional";
                  else if (event.type === "cursoT")
                    typeEvent="Teste Psicotécnico";

                  document.getElementById('btnModalShow').click();
                  document.getElementById('modalEvents').innerHTML = '<div class="modal-header"><p class="modal-title" id="modalTitleParagraph"><b>' + event.title + '</b></p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div id="modalBodyParagraph" class="modal-body"><p style="text-align:center;"><b>' + start + '</b> - <b>' + end + '</b></p><p style="text-align:center;">' + date + '</p><p style="text-align:center;">' + typeEvent + '</p></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">OK</button></div>';
                },
            });
        }
    });
  </script>

@endsection