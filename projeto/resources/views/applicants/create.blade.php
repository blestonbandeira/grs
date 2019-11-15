@extends('layouts.app')

@section('content')

<<<<<<< HEAD
<div class="modal fade modalCalendar" style="width: 98vw !important; margin: 15px;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100vw!important; margin: 15px;">
        <div class="modal-content d-flex justify-content-end" style="width: 95.5vw!important;">
            <div class="container-fluid" style="width: 90vw!important;">
                <button id="btnCloseModalFromInterviews" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style=" margin-top: 7px;background: #0089f2; border-radius: 17px; color: #fff; border: transparent; padding: 2px 10px 2px 10px;" aria-hidden="true">&times;</span>
                </button>
                <div class="row" style="width: 90vw!important;">
                    <div id="modalSuccessMessage" class="container-fluid" style="visibility:hidden; border-radius:10px; border: 1px solid #0089f2!important; padding: 50px; width: 26.7vw!important; position:absolute; z-index:100; background-color:white;">
                    </div>
                            
                    <div id="applicantListFromInterviews" class="col-md-2">
                    </div>
                    <div id="modalTime" class="col-md-10">
                        <div class="container" style="margin: 15px;">
                            <div id="calendar" style="width: 74vw!important;"></div>
                        </div>
                        <div id="hoursShowFromInterviews" class="container-fluid modal fade modalHours" style="width: 55vw!important;" role="dialog">
                            <div class="row">
                                <div>
                                    <ul id="interSelected">

                                    </ul>
                                </div>

                                <div class="col-md-1">
                                    <select id="hourSelectChange" class="form-control" style="width: 50px;">
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <b>:</b>
                                </div>

                                <div class="col-md-1">
                                    <select id="minSelectChange" class="form-control" style="width: 50px;">
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <b>h</b>
                                </div>
                                <div class="col">
                                    <button class="btn btn-info" onclick="saveInterview()">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
=======
<div class="content">
  <div class="container-fluid">
    <form action="/applicants" method="post">
      @csrf
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                <h4 class="card-title">Dados da Candidatura Online</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome Completo</label>
                    <input type="text" class="form-control input-border-width" name="name">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating bg-white p-1">Data-de-Nascimento</label>
                    <input type="date" class="form-control input-border-width" name="birthdate" value="birthdate" format="dd/MM/yyyy">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">N. Contribuinte</label>
                    <input type="text" class="form-control input-border-width" name="nif">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">N. CC</label>
                    <input type="text" class="form-control input-border-width" name="identityCard">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating bg-white p-1">Data de Validade</label>
                    <input type="date" class="form-control input-border-width" name="ccExpirationDate">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Naturalidade</label>
                    <input type="text" class="form-control input-border-width">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nacionalidade</label>
                    <input type="text" class="form-control input-border-width">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Estado Civil</label>
                    <input type="text" class="form-control input-border-width">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Morada</label>
                    <input type="text" id="name" class="form-control input-border-width">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Código Postal</label>
                    <input type="text" class="form-control input-border-width">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating" name="town">Localidade</label>
                    <input type="email" class="form-control input-border-width">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Concelho</label>
                    <input type="text" class="form-control input-border-width">
                  </div>
                </div>
                {{-- <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Distrito</label>
                    <input type="text" class="form-control input-border-width">
                  </div>
                </div> --}}

                <div class="col-md-3">
                  <div>
                    <label class="label-create-form pb-2">Distrito</label>
                    <select name="id_district" class="custom-select input-border-width">
                        @foreach($districts as $district)
                              <option value="{{ $district->id }}">
                                  {{ $district->name }}
                              </option>
                          @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-3">
                  <div>
                    <label class="label-create-form" name="email">Contacto</label>
                    <input class="form-control input-border-width" type="text">
                  </div>
                </div>
                <div class="col-md-3">
                  <div>
                    <label class="label-create-form">Email</label>
                    <input type="email" class="form-control input-border-width" name="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Observações</label>
                    <div class="form-group">
                      <textarea class="form-control" rows="5"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <a class="float-right text-info" href="#">Preenchimento automático</a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                <h4 class="card-title">Dados Adicionais</h4>
              </div>
            </div>
            <div class="card-body">

              {{-- <div class="form-group">
                  <label class="bmd-label-floating">Genero</label>
                  <input class="form-control input-border-width" type="text" list="lista-generos" name="id_gender" id="lista-generos">
                  <datalist id="lista-generos">
                    @foreach($genders as $gender)
                      <option value="{{ $gender->name }}">
                          {{ $gender->id }}
                      </option>
                    @endforeach
                  </datalist>
              </div> --}}



              <div class="form-group">
                <label class="bmd-label-floating label-create-form">Genero</label>
                <select name="id_gender" class="custom-select input-border-width">
                    @foreach($genders as $gender)
                          <option value="{{ $gender->id }}">
                              {{ $gender->name }}
                          </option>
                      @endforeach
                </select>
              </div>






              <div class="form-group">
                <label class="bmd-label-floating">Estado Civil</label>
                <datalist id="civil">
                  <option value="Solteiro/a">
                  <option value="Casado/a">
                  <option value="Viuvo/a">
                  <option value="Outro">
                </datalist>
                <input list="civil" class="form-control input-border-width">
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Situação Face ao Emprego</label>
                <input type="text" class="form-control input-border-width">
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Habilitação Literárias</label>
                <input type="text" class="form-control input-border-width">
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Escola Proveniente</label>
                <input type="text" class="form-control input-border-width">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                <h4 class="card-title">Dados de Candidatura</h4>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label class="bmd-label-floating">Turma de Recrutamento</label>
                <datalist id="turma">
                  <option value="TPSI11.18">
                  <option value="TPSI10.18">
                  <option value="GR09.17">
                  <option value="GR09.18">
                  <option value="GR09.19">
                </datalist>
                <input list="turma" class="form-control input-border-width">
              </div>

              <div class="form-group">
                <label class="bmd-label-floating">Curso 1ª Opção</label>
                <datalist id="turma">
                  <option value="TPSI11.18">
                  <option value="TPSI10.18">
                  <option value="GR09.17">
                  <option value="GR09.18">
                  <option value="GR09.19">
                </datalist>
                <input list="turma" class="form-control input-border-width">
              </div>

              <div class="form-group">
                <label class="bmd-label-floating">Curso 2ª Opção</label>
                <datalist id="turma">
                  <option value="TPSI11.18">
                  <option value="TPSI10.18">
                  <option value="GR09.17">
                  <option value="GR09.18">
                  <option value="GR09.19">
                </datalist>
                <input list="turma" class="form-control input-border-width">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating bg-white p-1 p-1">Data de Candidatura</label>
                    <input type="date" class="form-control input-border-width">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating bg-white p-1">Data de Anulação</label>
                    <input type="date" class="form-control input-border-width">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Origem</label>
                    <datalist id="origem">
                      <option value="Open Day">
                      <option value="Open Day">
                      <option value="Open Day">
                      <option value="Open Day">
                      <option value="Open Day">
                    </datalist>
                    <input list="origem" class="form-control input-border-width">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Motivo da Anulação</label>
                    <datalist id="origem">
                      <option value="Não se sabe">
                      <option value="Não se sabe">
                      <option value="Não se sabe">
                      <option value="Não se sabe">
                      <option value="Não se sabe">
                    </datalist>
                    <input list="origem" class="form-control input-border-width">
                  </div>
>>>>>>> origin/turmas2
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

@endsection
=======
@endsection
>>>>>>> origin/turmas2
