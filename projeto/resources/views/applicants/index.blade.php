@extends('layouts.app')

@section('content')
<div class="col text-center">
        <div class="text-center"> 
                <label class="pr-3 pl-3">Filtrar por:</label>
                <select name="catgory_id" class="text-center custom-select w-25" onchange="this.form.submit()">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <label class="pr-3 pl-3">e</label>
                <select name="catgory_id" class="text-center custom-select w-25" onchange="this.form.submit()">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <br>
           
    <a href="/applicants/create">
        <button type="button" class="btn btn-info">
            Adicionar
        </button>
    </a>
    <a>
        <button type="button" class="btn btn-info" onclick="getApplicantsSelectedFromInterviews()" data-toggle="modal" data-target=".modalCalendar">
            Marcar Entrevista
        </button>
    </a>
    <a href="#">
        <button type="button" class="btn btn-info" onclick="getApplicantsSelectedFromTests()" data-toggle="modal" data-target=".modalTests">
            Marcar Prova
        </button>
    </a>
    
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row" style="displex: flex-inline;">
            <div class="col-md-12">
                <div class="accordion" id="rsClasses">
                    @foreach ($rsClasses as $rsClass)
                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#{{ $rsClass->name }}" aria-expanded="true" aria-controls="{{ $rsClass->name }}">
                            <h4 class="card-title">{{ $rsClass->name }}</h4>
                            <p class="card-category"> Nº de Candidatos:{{ $counter }} </p> 
                        </div>
                        <div id="{{ $rsClass->name }}" class="collapse" aria-labelledby="headingOne" data-parent="#rsClasses">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Idade</th>
                                        <th class="text-center">Media das Provas</th>
                                        <th class="text-center">Nota de Entrevista</th>
                                        <th class="text-center">Apto</th>
                                        <th class="text-center">Categorização</th>
                                        <th class="text-center"></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($applicants as $applicant)
                                        @if($rsClass->id == $applicant->rs_class_id)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input applicantsSelect" type="checkbox" value="{{$applicant->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $applicant->id }}
                                            </td>
                                            <td class="text-center" title="{{ $applicant->observations }}">
                                                {{ $applicant->name }}
                                            </td>
                                            <td class="text-center">
                                                22
                                            </td>
                                            <td class="text-center">
                                               <input type="text" value="22" style="text-align: center;" maxlength="2" size="1">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" value="22" style="text-align: center;" maxlength="2" size="1">
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-success" style=" display: inline-block;">Sim</button>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-group">
                                                    <select name="catgory_id" class="custom-select" onchange="this.form.submit()">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                             <td>
                                                <form action="/applicants/{{ $applicant->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar Candidato" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                                {{--<form action="/applicants/{{ $applicant->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remove" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>--}}
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
                <div class="pagination-sm float-right">
                    {{ $rsClasses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalCalendar" style="width: 98vw !important; margin: 15px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100vw!important; margin: 15px;">
        <div class="modal-content d-flex justify-content-end" style="width: 95.5vw!important;">
            <div class="container-fluid" style="width: 90vw!important; padding: 10px 0;">
                <button type="button" class="close btnCloseModal" data-dismiss="modal" aria-label="Close">
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
</div>

<!--MODAL PROVAS-->

<div id="modalTests" class="modal fade modalTests" style="width: 98vw !important; margin: 15px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100vw!important; margin: 15px;">
        <div class="modal-content d-flex justify-content-end" style="width: 95.5vw!important;">
            <div class="container-fluid" style="width: 90vw!important; padding: 10px 0;">
                <div id="modalSuccessMessageTests" class="container-fluid" style="visibility:hidden; border-radius:10px; border: 1px solid #0089f2!important; padding: 50px; width: 26.7vw!important; position:absolute; z-index:100; background-color:white;">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">Marcas Testes:</h5>
                    <button type="button" class="close btnCloseModal" data-dismiss="modal" aria-label="Close">
                        <span style=" margin-top: 7px;background: #0089f2; border-radius: 17px; color: #fff; border: transparent; padding: 2px 10px 2px 10px;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Data: </h4>
                    <input id="hoursProvas" class="form-control input-border-width" type="datetime-local" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="saveTests()" class="btn btn-primary">Marcar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--FIM MODAL PROVAS-->

<!--MODAL ERROS-->

<input id="btnModalErrors" type="hidden" data-toggle="modal" data-target=".modalErrors"/>

<div id="modalErrors" class="modal fade modalErrors" style="width: 98vw !important; margin: 15px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100vw!important; margin: 15px;">
        <div class="modal-content d-flex justify-content-end" style="width: 95.5vw!important;">
            <div class="container-fluid" style="width: 90vw!important; padding: 10px 0;">
                
                <div id="modalSuccessMessageTests" class="container-fluid" style="visibility:hidden; border-radius:10px; border: 1px solid #0089f2!important; padding: 50px; width: 26.7vw!important; position:absolute; z-index:100; background-color:white;">
                </div>
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close btnCloseModal" data-dismiss="modal" aria-label="Close">
                        <span style=" margin-top: 7px;background: #0089f2; border-radius: 17px; color: #fff; border: transparent; padding: 2px 10px 2px 10px;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modalErrorBody" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--FIM MODAL ERROS-->



<script>
    let eventAvailId;
    let appliSelectedId = [];
    let appliSelectedName = [];
    let appliSelected = null;
    let appliSelectedHtml = "";
    let appliSelectedCount = 0;
    let dateSelected = "";
    let eventSelectedId = 0;

    let testTypeSelected = null;

    var contTypeInterview = 0;
    var arrayTypeInterview = [];

    function getApplicantsSelectedFromInterviews()
    {
        let applicantsSelected = document.getElementsByClassName('applicantsSelect');
        appliSelectedName = [];
        let j = 0;
        let k = 0;
        let x = 0;
        for(let i = 0; i < applicantsSelected.length; i++)
        {
            if(applicantsSelected[i].checked)
            {
                appliSelectedId[j] = applicantsSelected[i].value;
                $.ajax({
                    contentType: "application/json",
                    url:"/api/applicants/" + applicantsSelected[i].value,
                    type:"GET",
                    data:{},
                    success:function(data)
                    { 
                        if(data['type'] != 1)
                        {
                            contTypeInterview += 1;
                            arrayTypeInterview[x] = data['name'];
                            x++;
                        }

                        appliSelectedName[k] = data['name'];
                        if(appliSelectedName.length == appliSelectedId.length){
                            innerApplicantsSelectedFromInterviews();
                            calendarCharge();
                            appliSelectedCount = appliSelectedName.length;
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
        if(contTypeInterview != 0){
            for(let i = 0; i < arrayTypeInterview.length; i++)
            {
                document.getElementById('btnModalErrors').click();
                document.getElementById('modalErrorBody').innerHTML += arrayTypeInterview[i];  
            }   
        }
        else
        {
            document.getElementById('hoursShowFromInterviews').classList.remove("show");
            document.getElementById('applicantListFromInterviews').innerHTML = "";
            let j = 0;
            for(let i = 0; i < appliSelectedName.length; i++)
            {
                document.getElementById('applicantListFromInterviews').innerHTML += "<li class='applOnClick btn btn-info' value=" + appliSelectedId[j] + " onclick='applicantSelectedFromInterviews(this)'><label style='width:10vw; color:white;'><b>" + appliSelectedName[j] + "</b></label><button class='removeAppl' style='background: #fff; border-radius: 17px; color: #0089f2; border: transparent; padding: 6px 12px 6px 12px;'>X</button></li>";
                j++;
            }
        }
        
    }

    function applicantSelectedFromInterviews(data)
    {
        appliSelectedHtml = data;
        let divActive = document.getElementById('applicantListFromInterviews');
        let numActives = divActive.getElementsByClassName('applOnClick');
        document.getElementById('hoursShowFromInterviews').classList.remove("show");
        for(i = 0; i < numActives.length; i++)
        {
            numActives[i].classList.remove("active");
        }
        data.className += " active";
        appliSelected = data.value;
    }

    function saveInterview()
    {
        let selected = appliSelected;
        let date = dateSelected + " " + document.getElementById('hourSelectChange').value + ":" + document.getElementById('minSelectChange').value + ":00";
        $.ajax({
            dataType: "json",
            url:"/api/events",
            type:"POST",
            data:{applicant_id:selected, event_type_id:1, event_id:eventSelectedId, date:date, availEvent:eventAvailId},
            success:function(data)
            {
                document.getElementById('hoursShowFromInterviews').classList.remove("show");
                let tempModal = document.getElementById('modalSuccessMessage');
                tempModal.innerHTML = "<h3 style='color:#0089f2'>Marcado com sucesso.</h3>";
                tempModal.style.visibility = "visible" ;
                appliSelectedHtml.setAttribute("style", "visibility: hidden; position: absolute;");
                setTimeout(
                    function(){
                        tempModal.style.visibility = "hidden";
                        if (appliSelectedCount == 0)
                            location.reload();
                    },2000);
                appliSelected = null;
            }
        });
    }

    function getApplicantsSelectedFromTests()
    {
        let applicantsSelected = document.getElementsByClassName('applicantsSelect');
        let j = 0;
        for(let i = 0; i < applicantsSelected.length; i++)
        {
            if(applicantsSelected[i].checked)
            {
                appliSelectedId[j] = applicantsSelected[i].value;
                j++;
            }
            
        }
    }

    function saveTests()
    {
        let date = document.getElementById('hoursProvas').value;
        $.ajax({
            dataType: "json",
            url:"/api/events",
            type:"POST",
            data:{user_id:{{Auth::id()}}, applicants_id:appliSelectedId, event_type_id:2, date:date},
            success:function(data)
            {
                let tempModal = document.getElementById('modalSuccessMessageTests');
                tempModal.innerHTML = "<h3 style='color:#0089f2'>Marcado com sucesso.</h3>";
                tempModal.style.visibility = "visible" ;
                setTimeout(function() {tempModal.style.visibility = "hidden";},2000);
                appliSelected = null;
                location.reload();
            }
        });
    }

    $("#applicantListFromInterviews").on("click", "button", function(e) {
        e.preventDefault();
        $(this).parent().remove();
        appliSelected = null;
        appliSelectedCount -= 1;
        if (appliSelectedCount == 0)
            location.reload();
    });

    $(".btnCloseModal").on("click", function() {
        location.reload();
    });


    //-------CALENDAR-------//

    function calendarCharge() {
        var allEvents;
        $.ajax({
            dataType: "json",
            url: "/api/events",
            type: "GET",
            data: { user_id:{{Auth::id()}}, event_type_id: 3 },
            success: function(data) {
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
                    editable: false,
                    selectable: false,
                    plugins: ['bootstrap'],
                    themeSystem: 'bootstrap',
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: allEvents,
                    selectHelper: true,
                    eventClick: function(event) {
                        eventAvailId = event.id;
                        if (appliSelected == null) {
                            let tempModal = document.getElementById('modalSuccessMessage');
                            tempModal.innerHTML = "<h3 style='color:#f00'>Selecionar Primeiro o Candidato!</h3>";
                            tempModal.style.visibility = "visible";
                            setTimeout(function() {
                                tempModal.style.visibility = "hidden";
                            }, 2000);
                        } else {
                            eventSelectedId = event.id;
                            let hourSelect = document.getElementById('hourSelectChange');
                            let minSelect = document.getElementById('minSelectChange');

                            minSelect.innerHTML = "<option>--</option>";

                            let start = $.fullCalendar.formatDate(event.start, "HH:mm:ss");
                            let end = $.fullCalendar.formatDate(event.end, "HH:mm:ss");
                            let date = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                            dateSelected = date;

                            let hourStart = $.fullCalendar.formatDate(event.start, "HH");
                            let minStart = $.fullCalendar.formatDate(event.start, "m");
                            let hourEnd = $.fullCalendar.formatDate(event.end, "HH");
                            let minEnd = $.fullCalendar.formatDate(event.end, "m");

                            hourSelect.innerHTML = "<option>--</option>";
                            document.getElementById('interSelected').innerHTML = "<b>" + event.title + "</b></br>" + start + " - " + end + "</br>" + date;

                            if (minEnd < 45) {
                                hourEnd = hourEnd - 1;
                            }

                            for (var i = hourStart; i <= hourEnd; i++)
                                hourSelect.innerHTML += "<option>" + i + "</option>";

                            hourSelect.addEventListener("click", function() 
                            {
                                minSelect.innerHTML = "<option>--</option>";
                                minStart = $.fullCalendar.formatDate(event.start, "m");
                                minEnd = $.fullCalendar.formatDate(event.end, "m");

                                if (hourSelect.value == hourStart) {
                                    if (hourSelect.value == hourEnd) {
                                        if ((minEnd - 45) < 0) {
                                            var time = 45 - minEnd;
                                            minEnd = 60 - time;
                                            minSelect.innerHTML = "<option>--</option>";
                                            for (var i = minStart; i <= minEnd; i++) {
                                                if (i < 10)
                                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                                else
                                                    minSelect.innerHTML += "<option>" + i + "</option>";
                                            }
                                        } else {
                                            minSelect.innerHTML = "<option>--</option>";
                                            if (minEnd == 0) {
                                                minSelect.innerHTML = "<option>00</option>";
                                            } else {
                                                for (var i = minStart; i <= minEnd; i++) {
                                                    if (i < 10)
                                                        minSelect.innerHTML += "<option>0" + i + "</option>";
                                                    else
                                                        minSelect.innerHTML += "<option>" + i + "</option>";
                                                }
                                            }
                                        }
                                    } else {
                                        for (var i = minStart; i <= 59; i++) {
                                            if (i < 10)
                                                minSelect.innerHTML += "<option>0" + i + "</option>";
                                            else
                                                minSelect.innerHTML += "<option>" + i + "</option>";
                                        }
                                    }
                                } else {
                                    minStart = 0;
                                    if (hourSelect.value == hourEnd) {
                                        var time = Math.abs(45 - minEnd);
                                        minEnd = Math.abs(60 - time);
                                        minSelect.innerHTML = "<option>--</option>";
                                        if (minEnd <= 0) {
                                            minSelect.innerHTML = "<option>00</option>";
                                        } else {
                                            for (var i = minStart; i <= minEnd; i++) {
                                                if (i < 10)
                                                    minSelect.innerHTML += "<option>0" + i + "</option>";
                                                else
                                                    minSelect.innerHTML += "<option>" + i + "</option>";
                                            }
                                        }
                                    } else {
                                        for (var i = 0; i <= 59; i++) {
                                            if (i < 10)
                                                minSelect.innerHTML += "<option>0" + i + "</option>";
                                            else
                                                minSelect.innerHTML += "<option>" + i + "</option>";
                                        }
                                    }
                                    // if ((minEnd - 45) < 0) {
                                    //     var time = 45 - minEnd;
                                    //     minEnd = 60 - time;
                                    //     minSelect.innerHTML = "<option>--</option>";
                                    //     for (var i = minStart; i <= minEnd; i++) {
                                    //         if (i < 10)
                                    //             minSelect.innerHTML += "<option>0" + i + "</option>";
                                    //         else
                                    //             minSelect.innerHTML += "<option>" + i + "</option>";
                                    //     }
                                    // } else {
                                    // if (hourSelect.value == hourEnd) {
                                    //     minEnd = minEnd - 45;
                                    //     minSelect.innerHTML = "<option>--</option>";
                                    //     if (minEnd == 0) {
                                    //         minSelect.innerHTML = "<option>00</option>";
                                    //     } else {
                                    //         for (var i = minStart; i <= minEnd; i++) {
                                    //             if (i < 10)
                                    //                 minSelect.innerHTML += "<option>0" + i + "</option>";
                                    //             else
                                    //                 minSelect.innerHTML += "<option>" + i + "</option>";
                                    //         }
                                    //     }
                                    // } else {
                                    //     for (var i = 0; i <= 59; i++) {
                                    //         if (i < 10)
                                    //             minSelect.innerHTML += "<option>0" + i + "</option>";
                                    //         else
                                    //             minSelect.innerHTML += "<option>" + i + "</option>";
                                    //     }
                                    // }

                                    // }
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