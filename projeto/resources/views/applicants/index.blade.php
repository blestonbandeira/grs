@extends('layouts.app')

@section('content')
<div class="col text-center">
    <a href="/applicants/create">
        <button type="button" class="btn btn-info">
            Adicionar
        </button>
    </a>
    <a>
        <button type="button" class="btn btn-info" onclick="getApplicantsSelected()" data-toggle="modal" data-target=".bd-example-modal-lg">
            Marcar Entrevista
        </button>
    </a>
    <a href="#">
        <button type="button" class="btn btn-info">
            Marcar Prova
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
                            <button class="card-title btn btn-link" type="button">Turma TPSI11.18</button>
                            <p class="card-category">Início: novembro 2018</p>
                            </div>
                            <div class="card-body table-responsive">
                                <div id="collapsePlusOne" class="collapse" aria-labelledby="headingOne" data-parent="#rsclasses">
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
                                                    {{ $applicant->id }}
                                                </td>
                                                <td>
                                                    {{ $applicant->name }}
                                                </td>

                                                <td>
                                                    {{ $applicant->category }}
                                                </td>
                                                <td class="d-flex">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <form action="/applicants/{{ $applicant->id }}" method="post">
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
    </div>

    <button id="btnModelShow" type="button" onclick="calendarCharge()" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

    <div class="modal fade bd-example-modal-lg" style="width: 90vw!important;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 90vw!important;">
            <div class="modal-content" style="width: 90vw!important;">
                <div class="container-fluid" style="width: 90vw!important;">
                    <div class="row" style="width: 90vw!important;">
                        <div id="applicantList" class="col-md-2">
                        </div>
                        <div class="col-md-10">
                            <div class="container" style="margin-left: 10vw;margin-top:-10px;">
                                <div id="calendar" style="width: 55vw!important;"></div>
                            </div>
                            <div class="container-fluid" style="width: 55vw!important;">
                                <div class="row">
                                    <p id="interSelected"></p>
                                    <div class="col-lg-1">
                                        
                                        <select id="hourSelectChange" class="form-control" style="width: 50px;">
                                
                                        </select>
                                    </div>
                                    <b>:</b>
                                    <div class="col-lg-1">
                                        <select id="minSelectChange" class="form-control" style="width: 50px;">
                                
                                        </select>
                                    </div>
                                    <b>h</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
