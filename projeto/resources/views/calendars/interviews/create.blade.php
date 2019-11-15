@extends('layouts.app')

@section('content')
<input type="hidden" value="calendarClass" class="navLiSelect">


<div class="calendar-container" >
  <div class="row">

    <div class="col-md-4">
        <div id="applicants">
            <ul> 
                     </ul>
        </div>
    </div>

    <div class="col-md-8">
      <div id="calendar" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/pt.js"></script>
        <script>
            //-------CALENDAR-------//
            var allEvents;
            $.ajax({
                dataType: "json",
                url:"/api/events",
                type:"GET",
                data: {id_user:{{Auth::id()}}, id_event_type:4},
                success:function(data)
                {
                    allEvents = data;
                    var calendar = $('#calendar').fullCalendar(
                        {
                        defaultView: 'agendaWeek',
                        contentHeight: 'auto',
                        locale: 'pt',
                        slotDuration: '00:15:00',
                        slotLabelInterval: 15,
                        slotMinutes: 15,
                        slotLabelFormat: 'HH:mm',
                        timeFormat: 'HH:MM',
                        minTime: "09:00:00",
                        maxTime: "19:00:00",
                        allDaySlot: false,
                        weekends: false,                
                        editable:false,
                        selectable:false,
                        plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
                        themeSystem: 'bootstrap',
                        header:
                            {
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
                            document.getElementById('modalEvents').innerHTML = '<div class="modal-header"><p class="modal-title" id="modalTitleParagraph">Insira o nome:</p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div id="modalBodyParagraph" class="modal-body"><p>Data de Inicio: ' + start + '<br/>Data de Fim: ' + end + '</p><input id="startEvents" type="hidden" value="' + start + '"/><input id="endEvents" type="hidden" value="' + end + '"/></div><div id="modalBodyParagraph" class="modal-body"><p><input id="inputTitleEvents" class="form-control" type="text" placeholder="Titulo do Evento"/><input type="radio" name="eventType" class="eventRadio" value="interview"> Entrevista<br><input type="radio" name="eventType" class="eventRadio" value="cursoNA"> Prova de Aferição<input type="radio" name="eventType" class="eventRadio" value="cursoA"> Inventario Vocacional<br><input type="radio" name="eventType" class="eventRadio" value="cursoT">Teste Psicotecnico<br></p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-primary" onclick="createEvents()">Criar</button></div>';
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
                                data:{start_event:start, end_event:end},
                                success:function()
                                {
                                    document.getElementById('btnModalShow').click();
                                    document.getElementById('modalEvents').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Horário alterado com sucesso para: ' + title + '!</p></div></div>'; 
                                    setTimeout(function() 
                                    {
                                        location.reload();
                                    },2000);
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
                                data:{start_event:start, end_event:end},
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
                            if (event.type === "interview")
                                typeEvent="Entrevista";
                            else if (event.type === "cursoNA")
                                typeEvent="Prova de Aferição";
                            else if (event.type === "cursoA")
                                typeEvent="Inventário Vocacional";
                            else if (event.type === "cursoT")
                                typeEvent="Teste Psicotécnico";

                            document.getElementById('btnModalShow').click();
                            document.getElementById('modalEvents').innerHTML = '<div class="modal-header"><p class="modal-title" id="modalTitleParagraph"><b>' + event.title + '</b></p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div id="modalBodyParagraph" class="modal-body"><p style="text-align:center;"><b>' + start + '</b> - <b>' + end + '</b></p><p style="text-align:center;">' + date + '</p><p style="text-align:center;">' + typeEvent + '</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-danger" onclick="confirmDeleteEvents()">Eliminar</button></div>';
                            document.getElementById('modalEvents').innerHTML = '<div class="modal-header"><p class="modal-title" id="modalTitleParagraph"><b>' + event.title + '</b></p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div id="modalBodyParagraph" class="modal-body"><p style="text-align:center;"><b>' + start + '</b> - <b>' + end + '</b></p><p style="text-align:center;">' + date + '</p><p style="text-align:center;">' + typeEvent + '</p></div><div class="modal-footer">@if(Auth::user()->id_permissionLevel != "2")<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><button type="button" class="btn btn-danger" onclick="confirmDeleteEvents()">Eliminar</button>@else<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>@endif</div>';
                        },
                    });
                }
            });
        </script>
      </div>
    </div>

 
</div>
@endsection

