@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">   
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="/users/create">
                    <button type="button" class="btn btn-info">
                        Adicionar Novo Utilizador
                    </button>
                </a>
            </div>
            <div class="col-md-12 text-center">
                <button type="button" class="btn btn-info" onclick="deleteSelected()">
                    Eliminar Utilizador(es)
                </button>
            </div>
        </div>      
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="usersShow">               
                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="Users">
                            <h4 class="card-title">Utilizadores</h4>                                
                        </div>

                        <div id="users" class="collapse show" aria-labelledby="headingOne" data-parent="#usersShow">
                            <div class="card-body table-responsive">                                
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Nível de Acesso</th>
                                        <th></th> 
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input usersSelect" type="checkbox" value="{{$user->id}}">
                                                            <span class="form-check-sign">
                                                            <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $user->id }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>

                                                <td>
                                                    {{ $user->permissionLevel['name'] }}
                                                </td>
                                                <td class="d-flex">
                                                    <a href="/users/{{ $user->id }}/edit">
                                                        <button type="button" rel="tooltip" title="Editar Curso" class="btn btn-info btn-link btn-sm border-0">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                    </a>

                                                    <button value="{{ $user->id }}" onclick="openModal(this.value)" type="button" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm border-0" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
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
       
        <div class="pagination-sm float-right">
            
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
        document.getElementById('formModal').action = "/users/" + data;
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
                    url:"/api/users/" + allSelected[i].value,
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