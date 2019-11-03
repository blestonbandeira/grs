//Calendar
function calendarCharge(){
  var allEvents;
  $.ajax({
      dataType: "json",
      url:"/api/events",
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
              editable:false,
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
                  hourSelect.addEventListener("click", function(){
                  hourEnd = $.fullCalendar.formatDate(event.end, "HH");
                  minEnd = $.fullCalendar.formatDate(event.end, "mm");
                      if(hourSelect.value == hourEnd && minEnd == 45){
                          minSelect.innerHTML = "<option>--</option>";
                          minEnd = 01;
                      for(var i = minStart; i < minEnd; i++)
                          if(i<10) 
                              minSelect.innerHTML += "<option>0" + i + "</option>";
                          else
                              minSelect.innerHTML += "<option>" + i + "</option>";
                      }else if(hourSelect.value == hourEnd && minEnd > 45){
                          minSelect.innerHTML = "<option>--</option>";
                          minEnd - 45;
                          for(var i = minStart; i <= minEnd; i++)
                          if(i<10) 
                              minSelect.innerHTML += "<option>0" + i + "</option>";
                          else
                              minSelect.innerHTML += "<option>" + i + "</option>";
                      }else if((hourSelect.value == hourEnd || hourEnd-hourStart == 1) && minEnd < 45){
                          minSelect.innerHTML = "<option>--</option>";
                          var numMinEnd = 45 - minEnd;
                          minEnd = 60 - numMinEnd;
                      for(var i = minStart; i <= minEnd; i++)
                          if(i<10) 
                              minSelect.innerHTML += "<option>0" + i + "</option>";
                          else
                              minSelect.innerHTML += "<option>" + i + "</option>";
                      }else if(hourSelect.value == hourEnd && minEnd < 45){
                          minSelect.innerHTML = "<option>--</option>";
                          var numMinEnd = 45 - minEnd;
                          minEnd = 60 - numMinEnd;
                          minStart = 0;
                          for(var i = minStart; i <= minEnd; i++)
                          if(i<10) 
                              minSelect.innerHTML += "<option>0" + i + "</option>";
                          else
                              minSelect.innerHTML += "<option>" + i + "</option>";
                      }else {
                          minSelect.innerHTML = "<option>--</option>";
                          minStart = 0;
                          minEnd = 59;
                      for(var i = minStart; i <= minEnd; i++)
                          if(i<10) 
                              minSelect.innerHTML += "<option>0" + i + "</option>";
                          else
                              minSelect.innerHTML += "<option>" + i + "</option>";
                      }
                  });
                  
                      
              },
          });
      }
  });
}

//Select applicant
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
  
 
$(document).ready(function() {
  $().ready(function() {
    $sidebar = $('.sidebar');

    $sidebar_img_container = $sidebar.find('.sidebar-background');

    $full_page = $('.full-page');

    $sidebar_responsive = $('body > .navbar-collapse');

    window_width = $(window).width();

    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
      if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
        $('.fixed-plugin .dropdown').addClass('open');
      }

    }

    $('.fixed-plugin a').click(function(event) {
      // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
      if ($(this).hasClass('switch-trigger')) {
        if (event.stopPropagation) {
          event.stopPropagation();
        } else if (window.event) {
          window.event.cancelBubble = true;
        }
      }
    });

    $('.fixed-plugin .active-color span').click(function() {
      $full_page_background = $('.full-page-background');

      $(this).siblings().removeClass('active');
      $(this).addClass('active');

      var new_color = $(this).data('color');

      if ($sidebar.length != 0) {
        $sidebar.attr('data-color', new_color);
      }

      if ($full_page.length != 0) {
        $full_page.attr('filter-color', new_color);
      }

      if ($sidebar_responsive.length != 0) {
        $sidebar_responsive.attr('data-color', new_color);
      }
    });

    $('.fixed-plugin .background-color .badge').click(function() {
      $(this).siblings().removeClass('active');
      $(this).addClass('active');

      var new_color = $(this).data('background-color');

      if ($sidebar.length != 0) {
        $sidebar.attr('data-background-color', new_color);
      }
    });

    $('.fixed-plugin .img-holder').click(function() {
      $full_page_background = $('.full-page-background');

      $(this).parent('li').siblings().removeClass('active');
      $(this).parent('li').addClass('active');


      var new_image = $(this).find("img").attr('src');

      if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
        $sidebar_img_container.fadeOut('fast', function() {
          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $sidebar_img_container.fadeIn('fast');
        });
      }

      if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

        $full_page_background.fadeOut('fast', function() {
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          $full_page_background.fadeIn('fast');
        });
      }

      if ($('.switch-sidebar-image input:checked').length == 0) {
        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
      }

      if ($sidebar_responsive.length != 0) {
        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
      }
    });

    $('.switch-sidebar-image input').change(function() {
      $full_page_background = $('.full-page-background');

      $input = $(this);

      if ($input.is(':checked')) {
        if ($sidebar_img_container.length != 0) {
          $sidebar_img_container.fadeIn('fast');
          $sidebar.attr('data-image', '#');
        }

        if ($full_page_background.length != 0) {
          $full_page_background.fadeIn('fast');
          $full_page.attr('data-image', '#');
        }

        background_image = true;
      } else {
        if ($sidebar_img_container.length != 0) {
          $sidebar.removeAttr('data-image');
          $sidebar_img_container.fadeOut('fast');
        }

        if ($full_page_background.length != 0) {
          $full_page.removeAttr('data-image', '#');
          $full_page_background.fadeOut('fast');
        }

        background_image = false;
      }
    });

    $('.switch-sidebar-mini input').change(function() {
      $body = $('body');

      $input = $(this);

      if (md.misc.sidebar_mini_active == true) {
        $('body').removeClass('sidebar-mini');
        md.misc.sidebar_mini_active = false;

        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

      } else {

        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

        setTimeout(function() {
          $('body').addClass('sidebar-mini');

          md.misc.sidebar_mini_active = true;
        }, 300);
      }

      // we simulate the window Resize so the charts will get updated in realtime.
      var simulateWindowResize = setInterval(function() {
        window.dispatchEvent(new Event('resize'));
      }, 180);

      // we stop the simulation of Window Resize after the animations are completed
      setTimeout(function() {
        clearInterval(simulateWindowResize);
      }, 1000);

    });
  });
});


$(document).ready(function() {
  // Javascript method's body can be found in assets/js/demos.js
  md.initDashboardPageCharts();

});