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







<script>
    function getApplicantsSelected(){
        var applicantsSelected = document.getElementsByClassName('applicantsSelect');
        for(var i = 0; i < applicantsSelected.length; i++)
        if(applicantsSelected[i].checked)
        {
            
        }
    }
        
    
</script>













{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-left">
                        <h2></h2>
                    </div>
                    <div class="col text-right">
                        <a href="/applicants/create"><button type="button" class="btn btn-primary">NEW</button></a>
                    </div>
                </div>

</hr>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        NAME
                                    </th>
                                    <th>
                                        EMAIL
                                    </th>
                                    <th>
                                        TOWN
                                    </th>
                                    <th>
                                        do
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applicants as $applicant)
                                <tr>
                                    <td>
                                        {{$applicant->id}}
                                    </td>
                                    <td>
                                        <a href="{{ url('/applicants/' . $applicant->id ) }}">{{$applicant->name}}</a>
                                    </td>
                                    <td>
                                        {{ Str::limit($applicant->email, 30)}}
                                    </td>
                                    <td>
                                        {{$applicant->town}}
                                    </td>
                                    <td>
                                        <form action="/applicants/{{ $applicant->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger btn-sm" value="DELETE">
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
</div> --}}

<script>
    // Add active class to the current button (highlight it)
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
