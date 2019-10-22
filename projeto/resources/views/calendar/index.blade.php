@extends('layouts.app')

@section('content')
<div class="container" style="margin-left: 10vw;margin-top:-10px;">
   <div id="calendar" style="width: 100%!important;"></div>
</div>



<button id="btnModalShow" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEventsShow" style="visibility: hidden;"></button>

<div class="modal fade" id="modalEventsShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <input type="hidden" id="idEvent">
    <div id="modalDelete" class="modal-content">
      
    </div>
  </div>
</div>


<script>
   function deleteEvents(){
    $.ajax({
      url:"/api/event/" + document.getElementById('idEvent').value,
      type:"DELETE",
      data:{},
      success:function()
      {
        document.getElementById('modalDelete').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Evento eliminado com sucesso!</p></div></div>'; 
        setTimeout(function() {location.reload();},3000);
      }
    })
  }
  function confirmDeleteEvents(){
    document.getElementById('modalDelete').innerHTML = '<div class="modal-header"><p class="modal-title">Deseja mesmo eliminar este evento?</p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>Tudo relacionado a este evento será perdido!</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button><button type="button" class="btn btn-danger" onclick="deleteEvents()">Sim, eliminar</button></div>';
  }
</script>

<script>
    // Add active class to the current button (highlight it)
    try{
        var header = document.getElementById("nav");
        var btns = header.getElementsByClassName("nav-item");
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
    }
    catch(err){
        document.getElementById("btnCalendar").className += " active";
    }
    document.getElementById("btnCalendar").className += " active";
    
</script>

@endsection
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
    var allEvents;
    $.ajax({
        dataType: "json",
        url:"/api/event",
        type:"GET",
        data:{},
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
                eventColor: '#378006',
                weekends: false,
                height: 550,
                editable:true,
                plugins: [ 'bootstrap' ],
                themeSystem: 'bootstrap',
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: allEvents,
                selectable:true,
                selectHelper:true,
                select: function(start, end, allDay)
                {
                    var title = prompt("Enter Event Title");
                    if(title)
                    {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url:"/api/event",
                            type:"POST",
                            data:{title:title, start_event:start, end_event:end},
                            success:function()
                            {
                                location.reload();
                            }
                        })
                    }
                },
                eventResize:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/api/event/" + id,
                        type:"PUT",
                        data:{title:title, start_event:start, end_event:end},
                        success:function()
                        {
                            location.reload();
                        }
                        
                    })
                },
                eventDrop:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/api/event/" + id,
                        type:"PUT",
                        data:{title:title, start_event:start, end_event:end},
                        success:function()
                        {
                            location.reload();
                        }
                    });
                },
                /*eventClick:function(event)
                {
                    if(confirm("Are you sure you want to remove it?"))
                    {
                        var id = event.id;
                        $.ajax({
                            url:"/api/event/" + id,
                            type:"DELETE",
                            data:{},
                            success:function()
                            {
                                location.reload();
                            }
                        })
                    }
                },*/
                eventClick:function(event)
                { 
                  document.getElementById('idEvent').value = event.id;
                  var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                  var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                  document.getElementById('btnModalShow').click();
                  document.getElementById('modalDelete').innerHTML = '<div class="modal-header"><p class="modal-title" id="modalTitleParagraph">' + event.title + '</p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div id="modalBodyParagraph" class="modal-body"><p>Data de Inicio: ' + start + '<br/>Data de Fim: ' + end + '</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-danger" onclick="confirmDeleteEvents()">Eliminar</button></div>';
                },
            });
        }
    });
  </script>