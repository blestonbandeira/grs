@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="rsclasses">
                        <div class="card">
                            <div class="card-header card-header-info" data-toggle="collapse" data-target="#collapsePlusOne" aria-expanded="true" aria-controls="collapsePlusOne">
                                <button class="card-title btn btn-link" type="button">Criar Nova Turma de Recrutamento</button>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th>Curso</th>
                                        <th>Mês de início</th>
                                        <th>Ano de início</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                            <select class="custom-select">
                                                @if (count($courseNames) > 0 )
                                                <option>-- selecione aqui o curso --</option>
                                                    @foreach($courseNames as $courseName)
                                                        <option value="{{$courseName}}">
                                                            {{ $courseName->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                <option>
                                                    --Não existem cursos na plataforma--
                                                </option>
                                                @endif
                                            </select>
                                            </td>

                                            <td>
                                                <select class="custom-select" name="month">
                                                    @foreach(range(1,12) as $month)
                                                        <option value="{{$month}}">
                                                                {{date("M", strtotime('2019-'.$month))}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="custom-select" name="year">
                                                    @for ($year = date('Y'); $year < date('Y') + 50; $year++)
                                                    <option value="{{$year}}">
                                                            {{$year}}
                                                    </option>
                                                    @endfor
                                                </select>
                                            </td>
                                            <td class="d-flex">
                                                <a href="/applicants/create">
                                                    <button type="button" class="btn btn-info">
                                                        Criar
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
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
