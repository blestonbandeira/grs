@extends('layouts.app')


@section('content')
<div class="col text-center">
    <a href="{{ route('courses.create') }}">
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
                          <h4>Gestão de Cursos<h4>
                            <h6> Nº. de Cursos em Recrutamento: {{ $courses->count()}}</h6>
                        </div>

                        <div class="card-body table-responsive">                            
                            <table class="table table-hover">
                                <thead class="text-info">
                                    <th></th>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Tipo</th>
                                    <th>Regime</th>
                                    <th>Escolaridade Mínima</th>
                                    <th></th>                         
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
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
                                                {{ $course->id }}                                               
                                            </td>

                                            <td>
                                                {{ $course->courseName['name'] }}
                                            </td>

                                            <td>
                                                {{ $course->courseType['name'] }}
                                              
                                            </td>
                                            <td>
                                                {{ $course->regime['name'] }}
                                            </td>
                                            <td>
                                                {{ $course->minimumQualification['name'] }}
                                            </td>
                                          
                                            <td class="d-flex">
                                                <a href="/courses/{{ $course->id }}/edit">
                                                    <button type="button" rel="tooltip" title="Editar Curso" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <button value="{{ $course->id }}" type="button" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm border-0" onclick="openModal(this.value)" value="DELETE">
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
            <form id="formModal" action="/courses/{{ $course->id }}" method="post">
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
        document.getElementById('formModal').action = "/courses/" + data;
        $('#btnModalShow').click();
    }
</script>

@endsection
