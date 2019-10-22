@extends('layouts.app')

@section('content')
<div class="container" style="margin-left: 10vw;margin-top:-10px;">
   <div id="calendar" style="width: 100%!important;"></div>
</div>



<button id="btnModalShow" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEventsShow" style="visibility: hidden;"></button>

<div class="modal fade" id="modalEventsShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <input type="hidden" id="idEvent">
    <div id="modalDelete" class="modal-content">
      
    </div>
  </div>
</div>


<script>
   function deleteEvents(){
    $.ajax({
      url:"/api/event/" + document.getElementById('idEvent').value,
      type:"DELETE",
      data:{},
      success:function()
      {
        document.getElementById('modalDelete').innerHTML='<div style="border-radius:20px;" class="modal-header"><div class="modal-body"><p style="text-align:center;">Evento eliminado com sucesso!</p></div></div>'; 
        setTimeout(function() {location.reload();},3000);
      }
    })
  }
  function confirmDeleteEvents(){
    document.getElementById('modalDelete').innerHTML = '<div class="modal-header"><p class="modal-title">Deseja mesmo eliminar este evento?</p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>Tudo relacionado a este evento será perdido!</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button><button type="button" class="btn btn-danger" onclick="deleteEvents()">Sim, eliminar</button></div>';
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