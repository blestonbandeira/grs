@extends('layouts.app')

@section('content')
<div class="col text-center">
    <a href="/applicants/create"><button type="button" class="btn btn-info">Adicionar</button></a>
    <a ><button type="button" class="btn btn-info" onclick="getApplicantsSelected()">Marcar Entrevista</button></a>
    <a href="#"><button type="button" class="btn btn-info">Marcar Prova</button></a>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header card-header-info">
          <button class=" card-title btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Turma TPSI11.18</button>
          <p class="card-category">Início: novembro 2018</p>
        </div>

        <div class="card-body table-responsive">
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <table class="table table-hover">
            <thead class="text-info">
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Categorização</th>
            <th></th>
            </thead>
            <tbody>
            @foreach ($applicants as $applicant)
                <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input applicantsSelect" type="checkbox" value="{{$applicant->id}}">
                                <span class="form-check-sign">
                                <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>
                        {{$applicant->id}}
                    </td>
                    <td>
                        {{$applicant->name}}
                    </td>

                    <td>
                        a definir
                    </td>
                    <td class="d-flex">
                        <button style="border: none; padding:0" type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-link btn-sm">
                            <i class="material-icons">edit</i>
                        </button>

                        <form action="/applicants/{{ $applicant->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button style="border: none; padding:0" type="submit" rel="tooltip" title="Remove" class="btn btn-info btn-link btn-sm"  value="DELETE"  type="submit">
                                <i class="material-icons">close</i>
                            </button>
                            {{-- <input type="submit" class="btn btn-danger btn-sm" value="DELETE"> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
      </div>
   </div>
  </div>
</div>



<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="container" style="margin-left: 10vw;margin-top:-10px;">
            <div id="calendar" style="width: 55vw!important;"></div>
        </div>
    </div>
  </div>
</div>



<script>
    function getApplicantsSelected(){
        var appliSelected = [];
        var applicantsSelected = document.getElementsByClassName('applicantsSelect');
        var i = 0;
        for(var i = 0; i < applicantsSelected.length; i++)
        {
            if(applicantsSelected[i].checked)
            {
                appliSelected[i] = applicantsSelected.value;
                i++;
            }
        }

    }

    
//-------CALENDAR-------//

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
                        url:"/api/event/" + id,
                        type:"PUT",
                        data:{title:title, type:evenType, start_event:start, end_event:end},
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
                        url:"/api/event/" + id,
                        type:"PUT",
                        data:{title:title, type:evenType, start_event:start, end_event:end},
                        success:function()
                        {
                          document.getElementById('btnModalShow').click();
                          document.getElementById('modalEvents').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Horário alterado com sucesso para: ' + title + '!</p></div></div>'; 
                          setTimeout(function() {location.reload();},2000);
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
                },
            });
        }
    });


    //----------NAV SELECTED---------//

    try{
        var header = document.getElementById("nav");
        var btns = header.getElementsByClassName("nav-item");
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
    }
    catch(err){
        document.getElementById("btnApplicant").className += " active";
    }
    document.getElementById("btnApplicant").className += " active";
  </script>
@endsection
