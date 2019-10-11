<?php
//index.php




?>
<!DOCTYPE html>
<html>
 <head>
  <title>TESTE CALENDARIO</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' />

  <script>
    var allEvents;
    $.ajax({
        dataType: "json",
        url:"/api/calendars",
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
                eventColor: '#378006',
                weekends: false,
                height: 720,
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
                            url:"/api/calendars",
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
                        url:"/api/calendars/" + id,
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
                        url:"/api/calendars/" + id,
                        type:"PUT",
                        data:{title:title, start_event:start, end_event:end},
                        success:function()
                        {
                            location.reload();
                        }
                    });
                },
                eventClick:function(event)
                {
                    if(confirm("Are you sure you want to remove it?"))
                    {
                        var id = event.id;
                        $.ajax({
                            url:"/api/calendars/" + id,
                            type:"DELETE",
                            data:{},
                            success:function()
                            {
                                location.reload();
                            }
                        })
                    }
                },
            });
        }
    });
  </script>
 </head>
 <body>
  <div class="container" style="margin-left: 10vw;">
   <div id="calendar" style="width: 130%!important;"></div>
  </div>
 </body>
</html>
