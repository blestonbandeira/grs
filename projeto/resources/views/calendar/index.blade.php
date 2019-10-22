@extends('layouts.app')

@section('content')
<div class="container" style="margin-left: 10vw;margin-top:-10px;">
   <div id="calendar" style="width: 100%!important;"></div>
</div>



<button id="btnModalShow" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEventsShow" style="visibility: hidden;"></button>

<div class="modal fade" id="modalEventsShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <input type="hidden" id="idEvent">
    <div id="modalEvents" class="modal-content">
      
    </div>
  </div>
</div>


<script>
  function createEvents()
  {
    var title = document.getElementById('inputTitleEvents').value;
    if(title)
    {
        var start = document.getElementById('startEvents').value;
        var end = document.getElementById('endEvents').value;

        $.ajax({
            url:"/api/event",
            type:"POST",
            data:{title:title, start_event:start, end_event:end},
            success:function()
            {
              document.getElementById('modalEvents').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Criado com sucesso!</p></div></div>'; 
              setTimeout(function() {location.reload();},2000);
            }
        })
    }
  }
  function deleteEvents(){
    $.ajax({
      url:"/api/event/" + document.getElementById('idEvent').value,
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
    document.getElementById('modalEvents').innerHTML = '<div class="modal-header"><p class="modal-title">Deseja mesmo eliminar?</p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>Tudo relacionado a este registo será perdido!</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button><button type="button" class="btn btn-danger" onclick="deleteEvents()">Sim, eliminar</button></div>';
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