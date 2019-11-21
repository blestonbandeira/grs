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
        data:{user_id:1},
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
                editable:true,
                selectable:true,
                plugins: [ 'bootstrap' ],
                themeSystem: 'bootstrap',
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: allEvents,
                selectHelper:true,
                select: function(start, end, allDay)
                {
                  var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                  var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                  document.getElementById('btnModalShow').click();       
                  document.getElementById('modalEvents').innerHTML = '<div class="modal-header"><p class="modal-title" id="modalTitleParagraph">Insira o nome:</p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div id="modalBodyParagraph" class="modal-body"><p>Data de Inicio: ' + start + '<br/>Data de Fim: ' + end + '</p><input id="startEvents" type="hidden" value="' + start + '"/><input id="endEvents" type="hidden" value="' + end + '"/></div><div id="modalBodyParagraph" class="modal-body"><p><input id="inputTitleEvents" class="form-control" type="text" placeholder="Titulo do Evento"/><input type="radio" name="eventType" class="eventRadio" value="interview"> Entrevista<br><input type="radio" name="eventType" class="eventRadio" value="cursoNA"> Prova de Aferição<input type="radio" name="eventType" class="eventRadio" value="cursoA"> Inventario Vocacional<br><input type="radio" name="eventType" class="eventRadio" value="cursoT">Provas de Selecção<br></p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-primary" onclick="createEvents()">Criar</button></div>';
                },
                eventResize:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    var evenType = event.type; 

                    $.ajax({
                        url:"/api/events/" + id,
                        type:"PUT",
                        data:{user_id:{{Auth::id()}}, title:title, type:evenType, start_event:start, end_event:end},
                        success:function()
                        {
                          document.getElementById('btnModalShow').click();
                          document.getElementById('modalEvents').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Horário alterado com sucesso para: ' + title + '!</p></div></div>'; 
                          setTimeout(function() {location.reload();},2000);
                        }
                        
                    })
                },
                eventDrop:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    var evenType = event.type; 

                    $.ajax({
                        url:"/api/events/" + id,
                        type:"PUT",
                        data:{user_id:{{Auth::id()}}, title:title, type:evenType, start_event:start, end_event:end},
                        success:function()
                        {
                          document.getElementById('btnModalShow').click();
                          document.getElementById('modalEvents').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Horário alterado com sucesso para: ' + title + '!</p></div></div>'; 
                          setTimeout(function() {location.reload();},2000);
                        }
                    });
                },
                eventClick:function(event)
                { 
                  document.getElementById('idEvent').value = event.id;
                  var start = $.fullCalendar.formatDate(event.start, "HH:mm:ss");
                  var end = $.fullCalendar.formatDate(event.end, "HH:mm:ss");
                  var date = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                  var typeEvent;
                  if (event.type == "interview")
                    typeEvent="Entrevista";
                  else if (event.type == "cursoNA")
                    typeEvent="Prova de Aferição";
                  else if (event.type == "cursoA")
                    typeEvent="Inventário Vocacional";
                  else if (event.type == "cursoT")
                    typeEvent="Teste Psicotécnico";

                  document.getElementById('btnModalShow').click();
                  document.getElementById('modalEvents').innerHTML = '<div class="modal-header"><p class="modal-title" id="modalTitleParagraph"><b>' + event.title + '</b></p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div id="modalBodyParagraph" class="modal-body"><p style="text-align:center;"><b>' + start + '</b> - <b>' + end + '</b></p><p style="text-align:center;">' + date + '</p><p style="text-align:center;">' + typeEvent + '</p></div><div class="modal-footer">@if(Auth::user()->permission_level_id != "2")<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-danger" onclick="confirmDeleteEvents()">Eliminar</button>@else<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>@endif</div>';
                },
            });
        }
    });
  </script>
<script>
  function createEvents()
  {
    var title = document.getElementById('inputTitleEvents').value;
    if(title)
    {
        var start = document.getElementById('startEvents').value;
        var end = document.getElementById('endEvents').value;
        var evenType; 

        var radio = document.getElementsByClassName('eventRadio');
        for(var i = 0; i < 4; i++)
          if(radio[i].checked)
            evenType = radio[i].value;

        $.ajax({
            url:"/api/events",
            type:"POST",
            data:{user_id:{{ Auth::id() }}, title:title, type:evenType, start_event:start, end_event:end},
            success:function(data)
            {
              document.getElementById('modalEvents').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Criado com sucesso!</p></div></div>'; 
              setTimeout(function() {location.reload();},2000);
            }
        })
    }
  }
  function deleteEvents(){
    $.ajax({
      url:"/api/events/" + document.getElementById('idEvent').value,
      type:"DELETE",
      data:{},
      success:function()
      {
        document.getElementById('modalEvents').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Eliminado com sucesso!</p></div></div>'; 
        setTimeout(function() {location.reload();},2000);
      }
    })
  }
  function confirmDeleteEvents(){
    document.getElementById('modalEvents').innerHTML = '<div class="modal-header"><p class="modal-title">Tem a certeza que pretende eliminar?</p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>Este registo será totalmente perdido!</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button><button type="button" class="btn btn-danger" onclick="deleteEvents()">Sim, eliminar</button></div>';
  }
</script>

@endsection