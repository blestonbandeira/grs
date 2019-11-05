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
                            <div class="card-header card-header-info" data-toggle="collapse" data-target="#collapsePlusOne" aria-expanded="true" aria-controls="collapsePlusOne">
                                <button class="card-title btn btn-link" type="button">Gestão de Turmas de Recrutamento</button>
                                </div>
                                <div class="card-body table-responsive">
                                    {{-- <div id="collapsePlusOne" class="collapse" aria-labelledby="headingOne" data-parent="#rsclasses"> --}}
                                    <table class="table table-hover">
                                        <thead class="text-info">
                                            <th></th>
                                            <th>ID</th>
                                            <th>Curso</th>
                                            <th>Mês de início</th>
                                            <th>Ano de início</th>
                                            <th>Nº de Inscrições</th>
                                            <th>Nº de Aptos</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($rsclasses as $rsclass) --}}
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                {{-- <input class="form-check-input applicantsSelect" type="checkbox" value="{{$rsclass->id}}"> --}}
                                                                <span class="form-check-sign">
                                                                <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        TPSI11.18
                                                        {{-- {{ $applicant->category }} --}}
                                                    </td>
    
                                                    <td>
                                                        Técnico de Programação e Sistemas Informáticos
                                                        {{-- {{ $applicant->category }} --}}
                                                    </td>
                                                    <td>
                                                        Novembro
                                                        {{-- {{ $applicant->category }} --}}
                                                    </td>
                                                    <td>
                                                        2018
                                                        {{-- {{ $applicant->category }} --}}
                                                    </td>
                                                    <td>
                                                        97
                                                        {{-- {{ $applicant->category }} --}}
                                                    </td>
                                                    <td>
                                                        16
                                                        {{-- {{ $applicant->category }} --}}
                                                    </td>
                                                    <td class="d-flex">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        {{-- <form action="/applicants/{{ $rsclass->id }}" method="post"> --}}
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" rel="tooltip" title="Remove" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            {{-- @endforeach --}}
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

@endsection