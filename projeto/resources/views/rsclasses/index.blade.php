@extends('layouts.app')
@section('content')
<div class="col text-center">
    <a href="{{ route('rsclasses.create') }}">
        <button type="button" class="btn btn-info">
            Adicionar
        </button>
    </a>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="rsclasses">
                    <div class="card">
                        <div class="card-header card-header-info">
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
                                                {{ $rsClass->name }}
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
                                            <form action="/rsclasses/{{ $rsClass->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm border-0" value="DELETE">
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
</div>

@endsection