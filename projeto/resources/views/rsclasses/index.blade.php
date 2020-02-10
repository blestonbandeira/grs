@extends('layouts.app')

@section('content')
<div class="col text-center">
    <a href="{{ route('rsclasses.create') }}">
        <button type="button" class="btn btn-info">
            Adicionar
        </button>
    </a>
</div>
<div class="col-md-12 text-center">
    <button type="button" class="btn btn-info" onclick="deleteSelected()">
        Eliminar Turma(s)
    </button>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="rsclasses">
                    <div class="card">
                        <div class="card-header card-header-info">
                            @if (count($rsClasses) <= 0 )
                                <h5> Não há Turmas de Recrutamento inseridas no sistema </h5>
                            @else
                                <h5>Gestão de Turmas de Recrutamento<h5>
                        </div>
                        <div class="card-body table-responsive">                            
                            <table class="table table-hover">
                                <thead class="text-info">
                                    <th></th>
                                    <th>ID</th>
                                    <th>Nome da Turma</th>
                                    <th>Nome do Curso</th>
                                    <th>Data de início</th>
                                    <th>Assistente de Formação</th>
                                    <th>Estado</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($rsClasses as $rsClass)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input usersSelect" type="checkbox" value="{{$rsClass->id}}">
                                                        <span class="form-check-sign">
                                                        <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>

                                                {{ $rsClass->id }}
                                            </td>
                                            <td>
                                                    <a href="/rsclasses/{{ $rsClass->id }}">

                                                {{ $rsClass->name }}</a>
                                            </td>

                                            <td> 
                                                {{ $rsClass->courseName->name}}
                                            </td>
                                            <td>
                                                {{ $rsClass->startDate }}
                                            </td>
                                            <td>
                                                {{ $rsClass->user->name }}
                                            </td>
                                            <td>
                                                {{ $rsClass->classState->name}}
                                            </td>
                                            <td class="d-flex">
                                                <a href="/rsclasses/{{ $rsClass->id }}/edit">
                                                    <button type="button" rel="tooltip" title="Editar Turma" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>                                            
                                                <button type="submit" value="{{ $rsClass->id }}" onclick="openModal(this.value)" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm border-0" value="DELETE">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<button id="btnModalShow" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEventsShow" style="visibility: hidden;"></button>

<div class="modal fade" id="modalEventsShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <input type="hidden" id="idEvent"/>
    <div id="modalEvents" class="modal-content">
        <div class="modal-header">
            <p class="modal-title">
                Tem a certeza que pretende eliminar?
            </p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Este registo será totalmente perdido!

            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                Não
            </button>
            <form id="formModal" action="" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" value="DELETE" style="margin-top: 24px;">
                    Sim, eliminar
                </button>
            </form>
        </div>
    </div>
  </div>
</div>
<script>
    function openModal(data)
    {
        document.getElementById('formModal').action = "/rsclasses/" + data;
        $('#btnModalShow').click();
    }

    function deleteSelected()
    {
        let allSelected = document.getElementsByClassName('usersSelect');
        let count = 0;
        for(let i = 0; i < allSelected.length; i++){
            if (allSelected[i].checked){
                $.ajax({
                    contentType: "application/json",
                    url:"/api/rsclasses/" + allSelected[i].value,
                    type:"DELETE",
                    data:{},
                    success:function(data)
                    { 
                    }
                });
            }
        }
        location.reload();
    }
</script>
@endsection