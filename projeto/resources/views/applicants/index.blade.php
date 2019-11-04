@extends('layouts.app')

@section('content')
<div class="col text-center">
    <a href="/applicants/create">
        <button type="button" class="btn btn-info">
            Adicionar
        </button>
    </a>
    <a>
        <button type="button" class="btn btn-info" onclick="getApplicantsSelected()" data-toggle="modal" data-target=".bd-example-modal-lg">
            Marcar Entrevista
        </button>
    </a>
    <a href="#">
        <button type="button" class="btn btn-info">
            Marcar Prova
        </button>
    </a>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="rsclasses">
                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#collapsePlusOne" aria-expanded="true" aria-controls="collapsePlusOne">
                            <button class="card-title btn btn-link" type="button">Turma TPSI11.18</button>
                            <p class="card-category">Início: novembro 2018</p>
                            </div>
                            <div class="card-body table-responsive">
                                <div id="collapsePlusOne" class="collapse" aria-labelledby="headingOne" data-parent="#rsclasses">
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
                                                    {{ $applicant->id }}
                                                </td>
                                                <td>
                                                    {{ $applicant->name }}
                                                </td>

                                                <td>
                                                    {{ $applicant->category }}
                                                </td>
                                                <td class="d-flex">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <form action="/applicants/{{ $applicant->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" rel="tooltip" title="Remove" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                            <i class="material-icons">close</i>
                                                        </button>
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

            <button id="btnModelShow" type="button" onclick="calendarCharge()" class="btn btn-primary" data-toggle="modal" data-target=".modalCalendar">Large modal</button>
            
            <button id="btnModelShow" type="button" onclick="calendarCharge()" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

            <div class="modal fade bd-example-modal-lg" style="width: 90vw!important;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="width: 90vw!important;">
                    <div class="modal-content" style="width: 90vw!important;">
                        <div class="container-fluid" style="width: 90vw!important;">
                            <div class="row" style="width: 90vw!important;">
                                <div id="applicantList" class="col-md-2">
                                    <button id="btnModelSh" type="button" class="btn btn-primary" data-toggle="modal" data-target=".modalHours">Large modal</button>
                                </div>
                                <div id="modalTime" class="col-md-10">
                                    <div class="container" style="margin-left: 10vw;margin-top:-10px;">
                                        <div id="calendar" style="width: 55vw!important;"></div>
                                    </div>
                                    <div class="container-fluid modal fade modalHours" style="width: 55vw!important;" role="dialog">
                                        <div class="row">
                                            <p id="interSelected"></p>

                                            <div class="col-md-1">
                                                <select id="hourSelectChange" class="form-control" style="width: 50px;">
                                                </select>
                                            </div>

                                            <div class="col-md-1">
                                                <b>:</b>
                                            </div>

                                            <div class="col-md-1">
                                                <select id="minSelectChange" class="form-control" style="width: 50px;">
                                                </select>
                                            </div>

                                            <div class="col-md-1">
                                                <b>h</b>
                                            </div>
                                        </div>
                                    </div>
                                    <b>h</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<script>
    function getApplicantsSelected(){
        var appliSelected = [];
        var applicantsSelected = document.getElementsByClassName('applicantsSelect');
        var j = 0;
        for(var i = 0; i < applicantsSelected.length; i++)
        {
            if(applicantsSelected[i].checked)
            {
                appliSelected[j] = applicantsSelected[i].value;
                $.ajax({
                    contentType: "application/json",
                    url:"/api/applicants/" + appliSelected[j],
                    type:"GET",
                    data:{},
                    success:function(data)
                    {
                        alert(data.d[0]);
                        var teste1 = JSON.parse(data);
                        alert(teste1[0]);
                        document.getElementById('applicantList').innerHTML += "<b><a src='/applicants/" + appliSelected[j] + "'><p>" + data.d[0][1] + "</p></a></b>";
                    }
                });
                j++;
            }
        }
        calendarCharge();
    }

//-------CALENDAR-------//

function calendarCharge(){
    var allEvents;
    $.ajax({
        dataType: "json",
        url:"/api/events",
        type:"GET",
        data:{id_user:{{Auth::id()}}},
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
                    var hourSelect = document.getElementById('hourSelectChange');
                    var minSelect = document.getElementById('minSelectChange');

                    var start = $.fullCalendar.formatDate(event.start, "HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "HH:mm:ss");
                    var date = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    var hourStart = $.fullCalendar.formatDate(event.start, "HH");
                    var minStart = $.fullCalendar.formatDate(event.start, "mm");
                    var hourEnd = $.fullCalendar.formatDate(event.end, "HH");
                    var minEnd = $.fullCalendar.formatDate(event.end, "mm");
                    

                    hourSelect.innerHTML = "<option>--</option>";
                    document.getElementById('interSelected').innerHTML = "<b>" + event.title + "</b></br>" + start + " - " + end + "</br>" + date;
                    
                    if(minEnd < 45){
                        for(var i = hourStart; i < hourEnd; i++)
                            hourSelect.innerHTML += "<option>" + i + "</option>";
                    }else{
                        for(var i = hourStart; i <= hourEnd; i++)
                            hourSelect.innerHTML += "<option>" + i + "</option>";
                    }
                    
                    hourSelect.addEventListener("click", function()
                    {
                        hourEnd = $.fullCalendar.formatDate(event.end, "HH");
                        minEnd = $.fullCalendar.formatDate(event.end, "mm");
                        
                        if(hourSelect.value == hourEnd && minEnd == 45)
                        {
                            minSelect.innerHTML = "<option>--</option>";
                            minEnd = 1;
                            for(var i = minStart; i < minEnd; i++)
                            {
                                if(i<10) 
                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                else
                                    minSelect.innerHTML += "<option>" + i + "</option>";
                            }
                        }
                        else if(hourSelect.value == hourEnd && minEnd > 45)
                        {
                            minSelect.innerHTML = "<option>--</option>";
                            minEnd - 45;
                            for(var i = minStart; i <= minEnd; i++)
                            {
                                if(i<10) 
                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                else
                                    minSelect.innerHTML += "<option>" + i + "</option>";
                            }
                        }
                        else if((hourSelect.value == hourEnd || hourEnd-hourStart == 1) && minEnd < 45)
                        {
                            minSelect.innerHTML = "<option>--</option>";
                            var numMinEnd = 45 - minEnd;
                            minEnd = 60 - numMinEnd;
                            for(var i = minStart; i <= minEnd; i++)
                            {
                                if(i<10) 
                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                else
                                    minSelect.innerHTML += "<option>" + i + "</option>";
                            }
                        }
                        else if(hourSelect.value == hourEnd && minEnd < 45)
                        {
                            minSelect.innerHTML = "<option>--</option>";
                            var numMinEnd = 45 - minEnd;
                            minEnd = 60 - numMinEnd;
                            minStart = 0;
                            for(var i = minStart; i <= minEnd; i++)
                            {
                                if(i<10) 
                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                else
                                    minSelect.innerHTML += "<option>" + i + "</option>";
                            }
                        }
                        else
                        {
                            minSelect.innerHTML = "<option>--</option>";
                            minStart = 0;
                            minEnd = 59;
                            for(var i = minStart; i <= minEnd; i++)
                            {
                                if(i<10) 
                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                else
                                    minSelect.innerHTML += "<option>" + i + "</option>";
                            }
                        }
                    }); 
                },
            });
        }
    });
}
</script>
@endsection
