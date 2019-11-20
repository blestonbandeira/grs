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
                                                <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <form action="/courses/{{ $course->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
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
