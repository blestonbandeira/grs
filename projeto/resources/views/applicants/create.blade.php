@extends('layouts.app')

@section('content')

<div class="content">
  <div class="container-fluid">
    <form action="/applicants" method="post">
      @csrf
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                <h4 class="card-title">Dados Pessoais</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Turma de Recrutamento</label>
                    <input type="text" class="form-control input-border-width" list="lista-turmas" name="rs_class_id">
                    <datalist id="lista-turmas">
                        @foreach($rsclasses as $rsclass)
                          <option value="{{ $rsclass->id }}">
                              {{ $rsclass->name }}
                          </option>
                        @endforeach
                      </datalist>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nome Completo</label>
                    <input type="text" class="form-control input-border-width" name="name">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating bg-white p-1">Data-de-Nascimento</label>
                    <input type="date" class="form-control input-border-width" name="birthdate" format="dd/MM/yyyy">
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
                    <input type="text" class="form-control input-border-width" name="birthtown">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nacionalidade</label>
                    <input type="text" class="form-control input-border-width" name="nationality">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Estado Civil</label>
                    <input type="text" class="form-control input-border-width" name="civilState">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Morada</label>
                    <input type="text" class="form-control input-border-width" name="address">
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
                    <label class="bmd-label-floating">Localidade</label>
                    <input type="text" class="form-control input-border-width" name="town">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Concelho</label>
                    <input type="text" class="form-control input-border-width" name="parish">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Distrito</label>
                    <input type="text" class="form-control input-border-width" list="lista-distritos" name="district_id">
                    <datalist id="lista-distritos">
                      @foreach($districts as $district)
                        <option value="{{ $district->id }}">
                            {{ $district->name }}
                        </option>
                      @endforeach
                    </datalist>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Contacto</label>
                    <input type="text" class="form-control input-border-width" name="phoneNumber">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="email" class="form-control input-border-width" name="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Observações</label>
                    <div class="form-group">
                      <textarea class="form-control" rows="5" name="observations"></textarea>
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

              <div class="form-group">
                  <label class="bmd-label-floating">Género</label>
                  <input class="form-control input-border-width" type="text" list="lista-generos" name="gender_id">
                  <datalist id="lista-generos">
                    @foreach($genders as $gender)
                      <option value="{{ \App\User::find($user->gender_id)->name }}">
                          {{ $gender->name }}
                      </option>
                    @endforeach
                  </datalist>
              </div>

              {{-- <div class="form-group">
                <label class="bmd-label-floating label-create-form">Genero</label>
                <select name="gender_id" class="custom-select input-border-width">
                    @foreach($genders as $gender)
                          <option value="{{ $gender->id }}">
                              {{ $gender->name }}
                          </option>
                      @endforeach
                </select>
              </div> --}}

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
                <input type="text" class="form-control input-border-width" list="lista-situacoes" name="unemployement_situation_id">
                <datalist id="lista-situacoes">
                  @foreach($unemployementSituations as $unemployementSituation)
                    <option value="{{ $unemployementSituation->id }}">
                        {{ $unemployementSituation->name }}
                    </option>
                  @endforeach
                </datalist>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Habilitação Literárias</label>
                <input type="text" class="form-control input-border-width" list="list-habilitacoes" name="education_id">
                <datalist id="lista-situacoes">
                  @foreach($educations as $education)
                    <option value="{{ $education->id }}">
                        {{ $education->name }}
                    </option>
                  @endforeach
                </datalist>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Escola de proveniência</label>
                <input type="text" class="form-control input-border-width" list="lista-escolas" name="provenance_school_id">
                <datalist id="lista-escolas">
                  @foreach($provenance_schools as $provenance_school)
                    <option value="{{ $provenance_school->id }}">
                        {{ $provenance_school->name }}
                    </option>
                  @endforeach
                </datalist>
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
                <label class="bmd-label-floating">Curso 1ª Opção</label>
                <input list="turma" class="form-control input-border-width" list="lista-cursos1" name="first_option_course_id">
                <datalist id="lista-cursos1">
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                  @endforeach
                </datalist>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Curso 2ª Opção</label>
                <input list="turma" class="form-control input-border-width" list="lista-cursos2" name="second_option_course_id">
                <datalist id="lista-cursos2">
                  @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                  @endforeach
                </datalist>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating bg-white p-1">Data de Candidatura</label>
                    <input type="date" class="form-control input-border-width" name="applicationDate">
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
                    <input list="lista-origens" class="form-control input-border-width" name="origin_id">
                    <datalist id="lista-origens">
                      @foreach($origins as $origin)
                        <option value="{{ $origin->id }}">
                            {{ $origin->name }}
                        </option>
                      @endforeach
                    </datalist>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Motivo da Anulação</label>
                    <input class="form-control input-border-width" list="lista-motivos" name="cancellation_reason_id">
                    <datalist id="lista-motivos">
                        @foreach($cancellationReasons as $cancellationReason)
                          <option value="{{ $cancellationReason->id }}">
                              {{ $cancellationReason->name }}
                          </option>
                        @endforeach
                      </datalist>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                <h4 class="card-title">Documentos Entregues</h4>
              </div>
            </div>
            <div class="card-body">

              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="">
                  BI/CC
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label><br><br>
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="">
                  Certificado de Habilitações
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label><br><br>
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="">
                  Cartão de Utente ou Declaração Centro de Emprego
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label><br><br>
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="">
                  Curriculum Vitae
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label><br><br>
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="">
                  Registo Criminal
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label><br><br>
              </div>

            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-info pull-right">Criar</button>
    </form>
  </div>
</div>



@endsection
