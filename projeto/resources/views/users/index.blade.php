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
                                                    {{ \App\User::find($user->permissionLevel)->name }}
                                                </td>
                                                <td class="d-flex">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <form action="/users/{{ $user->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" rel="tooltip" title="Remove" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                            <i class="material-icons">close</i>
                                                        </button>
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
       
        <div class="pagination-sm float-right">
            
        </div>
    </div>
</div>


@endsection