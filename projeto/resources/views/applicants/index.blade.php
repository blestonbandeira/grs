@extends('layouts.app')

@section('content')
<form method="POST" action="/calendars/interviews">
    @csrf   
    <div class="col text-center">
        <a href="/applicants/create">
            <button type="button" class="btn btn-info">
                Adicionar
            </button>
        </a>
        <a href="/calendars/interviews/create">
            <button type="button" class="btn btn-info" onclick="getApplicantsSelectedFromInterviews()">
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
                    @foreach ($rsclasses as $rsclass)
                        <div class="card">
                            <div class="card-header card-header-info" data-toggle="collapse" data-target="#{{ $rsclass->name }}" aria-expanded="true" aria-controls="{{ $rsclass->name }}">
                                <h4 class="card-title">{{ $rsclass->name }}</h4>
                                    {{-- <p class="card-category"> Nº de Candidatos: {{ count($applicants)}}</p> --}}
                            </div>

                            <div id="{{ $rsclass->name }}" class="collapse" aria-labelledby="headingOne" data-parent="#rsclasses">
                                <div class="card-body table-responsive">                                
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
                                                @if($rsclass->id == $applicant->id_rsClass)
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" name="applicantsSelect[]" type="checkbox" value="{{$applicant->id}}">
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
                                                @endif

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        
            <div class="pagination-sm float-right">
                {{ $rsclasses->links() }}
            </div>
        </div>
    </div>
</form>



<input id="btnModelShowFromInterviews" type="hidden" onclick="calendarCharge()" class="btn btn-primary" data-toggle="modal" data-target=".modalCalendar"/>

<div class="modal fade modalCalendar" style="width: 98vw !important; margin: 15px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100vw!important; margin: 15px;">
        <div class="modal-content d-flex justify-content-end" style="width: 95.5vw!important;">
            <div class="container-fluid" style="width: 90vw!important;">
                <button id="btnCloseModalFromInterviews" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style=" margin-top: 7px;background: #0089f2; border-radius: 17px; color: #fff; border: transparent; padding: 2px 10px 2px 10px;" aria-hidden="true">&times;</span>
                </button>
                <div class="row" style="width: 90vw!important;">
                    <div id="modalSuccessMessage" class="container-fluid" style="visibility:hidden; border-radius:10px; border: 1px solid #0089f2!important; padding: 50px; width: 26.7vw!important; position:absolute; z-index:100; background-color:white;">
                    </div>
                            
                    <div id="applicantListFromInterviews" class="col-md-2">
                    </div>
                    <div id="modalTime" class="col-md-10">
                        <div class="container" style="margin: 15px;">
                            <div id="calendar" style="width: 74vw!important;"></div>
                        </div>
                        <div id="hoursShowFromInterviews" class="container-fluid modal fade modalHours" style="width: 55vw!important;" role="dialog">
                            <div class="row">
                                <div>
                                    <ul id="interSelected">

                                    </ul>
                                </div>

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
                                <div class="col">
                                    <button class="btn btn-info" onclick="saveInterview()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--MODAL PROVAS-->
<input id="btnModelShowFromTests" type="button" onclick="" class="btn btn-primary" data-toggle="modal" data-target=".modalTests"/>

<div id="modalTests" class="modal fade modalTests" style="width: 98vw !important; margin: 15px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100vw!important; margin: 15px;">
        <div class="modal-content d-flex justify-content-end" style="width: 95.5vw!important;">
            <div class="container-fluid" style="width: 90vw!important;">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button onclick="getApplicantsSelectedFromTests(this)" type="button" class="btn btn-primary btnModalTests" value="1">Teste && Prova de Aferição</button>
                    <button onclick="getApplicantsSelectedFromTests(this)" type="button" class="btn btn-primary btnModalTests" value="2">Teste && Inventário Vocacional</button>
                </div>

                <div id="dayToTests" style="visibility:hidden;">
                    <h4>Data: </h4>
                    <input class="form-control input-border-width" type="datetime-local"/>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="" class="btn btn-primary">Marcar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--FIM MODAL PROVAS-->

<script>
    let appliSelectedIdFromInterviews = [];
    let appliSelectedNameFromInterviews = [];
    let appliSelectedFromInterviews = null;
    let appliSelectedHtmlFromInterviews = "";
    let dateSelectedFromInterviews = "";
    let eventSelectedIdFromInterviews = 0;

    let testTypeSelected = null;

    function getApplicantsSelectedFromInterviews()
    {
        let applicantsSelected = document.getElementsByClassName('applicantsSelect');
        appliSelectedNameFromInterviews = [];
        let j = 0;
        let k = 0;
        for(let i = 0; i < applicantsSelected.length; i++)
        {
            if(applicantsSelected[i].checked)
            {
                appliSelectedIdFromInterviews[j] = applicantsSelected[i].value;
                $.ajax({
                    contentType: "application/json",
                    url:"/api/applicants/" + applicantsSelected[i].value,
                    type:"GET",
                    data:{},
                    success:function(data)
                    { 
                        appliSelectedNameFromInterviews[k] = data[0]['name'];
                        if(appliSelectedNameFromInterviews.length == appliSelectedIdFromInterviews.length){
                            innerApplicantsSelectedFromInterviews();
                            document.getElementById('btnModelShowFromInterviews').click();
                            calendarCharge();
                        }
                        k++;
                    }
                });
                j++;
            }
        }
    }

    function innerApplicantsSelectedFromInterviews()
    {
        document.getElementById('hoursShowFromInterviews').classList.remove("show");
        document.getElementById('applicantListFromInterviews').innerHTML = "";
        let j = 0;
        for(let i = 0; i < appliSelectedNameFromInterviews.length; i++)
        {
            document.getElementById('applicantListFromInterviews').innerHTML += "<li class='applOnClick btn btn-info' value=" + appliSelectedIdFromInterviews[j] + " onclick='applicantSelectedFromInterviews(this)'><label style='width:10vw; color:white;'><b>" + appliSelectedNameFromInterviews[j] + "</b></label><button class='removeAppl' style='background: #fff; border-radius: 17px; color: #0089f2; border: transparent; padding: 6px 12px 6px 12px;'>X</button></li>";
            j++;
        }
    }

    function applicantSelectedFromInterviews(data)
    {
        appliSelectedHtmlFromInterviews = data;
        let divActive = document.getElementById('applicantListFromInterviews');
        let numActives = divActive.getElementsByClassName('applOnClick');
        document.getElementById('hoursShowFromInterviews').classList.remove("show");
        for(i = 0; i < numActives.length; i++)
        {
            numActives[i].classList.remove("active");
        }
        data.className += " active";
        appliSelectedFromInterviews = data.value;
    }

    function saveInterview()
    {
        let selected = appliSelectedFromInterviews;
        let date = dateSelectedFromInterviews + " " + document.getElementById('hourSelectChange').value + ":" + document.getElementById('minSelectChange').value + ":00";
        $.ajax({
            dataType: "json",
            url:"/api/events",
            type:"POST",
            data:{id_applicant:selected, id_event:eventSelectedIdFromInterviews, date:date},
            success:function(data)
            {
                document.getElementById('hoursShowFromInterviews').classList.remove("show");
                let tempModal = document.getElementById('modalSuccessMessage');
                tempModal.innerHTML = "<h3 style='color:#0089f2'>Marcado com sucesso.</h3>";
                tempModal.style.visibility = "visible" ;
                appliSelectedHtmlFromInterviews.setAttribute("style", "visibility: hidden; position: absolute;");
                setTimeout(function() {tempModal.style.visibility = "hidden";},2000);
                appliSelectedFromInterviews = null;
            }
        });
    }



    function getApplicantsSelectedFromTests(data)
    {
        let divActive = document.getElementById('modalTests');
        let numActives = divActive.getElementsByClassName('btnModalTests');
        for(i = 0; i < numActives.length; i++)
        {
            numActives[i].classList.remove("active");
        }
        data.className += " active";
        testTypeSelected = data.value;

        let tempModal = document.getElementById('dayToTests');
        tempModal.style.visibility = "visible" ;
    }



    $("#applicantListFromInterviews").on("click", "button", function(e) {
        e.preventDefault();
        $(this).parent().remove();
        appliSelectedFromInterviews = null;
    });

    $("#btnCloseModalFromInterviews").on("click", function() {
        location.reload();
    });


//-------CALENDAR-------//

function calendarCharge(){
    var allEvents;
    $.ajax({
        dataType: "json",
        url:"/api/events",
        type:"GET",
        data:{id_user:{{Auth::id()}}, id_event_type:4},
        success:function(data)
        {
            allEvents = data;
            var calendar = $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                slotDuration: '00:15:00',
                slotLabelInterval: 15,
                slotLabelFormat: 'HH:mm',
                slotMinutes: 15,
                timeFormat: 'HH:mm',
                minTime: "09:00:00",
                maxTime: "19:00:00",
                allDaySlot: false,
                weekends: false,
                height: 750,
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
                    if(appliSelectedFromInterviews == null){
                        let tempModal = document.getElementById('modalSuccessMessage');
                        tempModal.innerHTML = "<h3 style='color:#f00'>Selecionar Primeiro o Candidato!</h3>";
                        tempModal.style.visibility = "visible" ;
                        setTimeout(function() {tempModal.style.visibility = "hidden";},2000);
                    }
                    else
                    {
                        eventSelectedIdFromInterviews = event.id;
                        let hourSelect = document.getElementById('hourSelectChange');
                        let minSelect = document.getElementById('minSelectChange');

                        minSelect.innerHTML = "<option>--</option>";

                        let start = $.fullCalendar.formatDate(event.start, "HH:mm:ss");
                        let end = $.fullCalendar.formatDate(event.end, "HH:mm:ss");
                        let date = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                        dateSelectedFromInterviews = date;

                        let hourStart = $.fullCalendar.formatDate(event.start, "HH");
                        let minStart = $.fullCalendar.formatDate(event.start, "m");
                        let hourEnd = $.fullCalendar.formatDate(event.end, "HH");
                        let minEnd = $.fullCalendar.formatDate(event.end, "m");
                        
                        hourSelect.innerHTML = "<option>--</option>";
                        document.getElementById('interSelected').innerHTML = "<b>" + event.title + "</b></br>" + start + " - " + end + "</br>" + date;
                        
                        if(minEnd < 45){
                            hourEnd = hourEnd - 1;
                        }
                        
                        for(var i = hourStart; i <= hourEnd; i++)
                            hourSelect.innerHTML += "<option>" + i + "</option>";

                        hourSelect.addEventListener("click", function()
                        {
                            minSelect.innerHTML = "<option>--</option>";
                            minStart = $.fullCalendar.formatDate(event.start, "m");
                            minEnd = $.fullCalendar.formatDate(event.end, "m");
                            
                            if (hourSelect.value == hourStart)
                            {
                                if(hourSelect.value == hourEnd)
                                {
                                    if((minEnd - 45) < 0){
                                        var time = 45 - minEnd;
                                        minEnd = 60 - time;
                                        minSelect.innerHTML = "<option>--</option>";
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
                                        if(minEnd == 0)
                                        {
                                            minSelect.innerHTML = "<option>00</option>";
                                        }
                                        else
                                        {
                                            for(var i = minStart; i <= minEnd; i++)
                                            {
                                                if(i<10) 
                                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                                else
                                                    minSelect.innerHTML += "<option>" + i + "</option>";
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    for(var i = minStart; i <= 59; i++)
                                    {
                                        if(i<10) 
                                            minSelect.innerHTML += "<option>0" + i + "</option>";
                                        else
                                            minSelect.innerHTML += "<option>" + i + "</option>";
                                    }
                                }
                            }
                            else
                            {
                                minStart = 0;
                                if((minEnd - 45) < 0){
                                    var time = 45 - minEnd;
                                    minEnd = 60 - time;
                                    minSelect.innerHTML = "<option>--</option>";
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
                                    if(hourSelect.value == hourEnd)
                                    {
                                        minEnd = minEnd - 45;
                                        minSelect.innerHTML = "<option>--</option>";
                                        if(minEnd == 0)
                                        {
                                            minSelect.innerHTML = "<option>00</option>";
                                        }
                                        else
                                        {
                                            for(var i = minStart; i <= minEnd; i++)
                                            {
                                                if(i<10) 
                                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                                else
                                                    minSelect.innerHTML += "<option>" + i + "</option>";
                                            }
                                        }
                                    }
                                    else
                                    {
                                        for(var i = 0; i <= 59; i++)
                                        {
                                            if(i<10) 
                                                minSelect.innerHTML += "<option>0" + i + "</option>";
                                            else
                                                minSelect.innerHTML += "<option>" + i + "</option>";
                                        }
                                    }
                                    
                                }
                            }
                        }); 
                        document.getElementById('hoursShowFromInterviews').className += " show";
                    }
                }, 
            });
        }
    });
}
</script>
@endsection