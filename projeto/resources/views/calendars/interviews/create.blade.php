@extends('layouts.app')

@section('content')
<input type="hidden" value="calendarClass" class="navLiSelect">


<div class="calendar-container" >
  <div class="row">
    <div class="col-md-10">
      <div id="calendar" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/locale/pt.js"></script>
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
              let date = dateSelectedFromInterviews + " " + document.getElementById('hourSelectChange').value 
              + ":" + document.getElementById('minSelectChange').value + ":00";
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

