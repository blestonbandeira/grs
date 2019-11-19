@extends('layouts.app')

@section('content')

<div class="content">
  <div class="container-fluid">
    <form action="/applicants" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                <h4 class="card-title">Dados Pessoais</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <label>Turma de Recrutamento</label>
                  <select name="rs_class_id" class="custom-select" style="height: 36px">
                    @foreach($rsclasses as $rsclass)
                      <option value="{{ $rsclass->id }}">
                          {{ $rsclass->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                    <label>Nome Completo</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="name">
                </div>
                <div class="col-md-4">
                  <label>Data-de-Nascimento</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="birthdate" format="dd/MM/yyyy">
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                    <label>N. Contribuinte</label>
                    <input type="text" class="form-control" name="nif">
                </div>
                <div class="col-md-4">
                    <label>N. CC</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="identityCard">
                </div>
                <div class="col-md-4">
                    <label>Data de Validade</label>
                    <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="ccExpirationDate">
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                    <label>Naturalidade</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="birthtown">
                </div>
                <div class="col-md-4">
                    <label>Nacionalidade</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="nationality">
                </div>
                <div class="col-md-4">
                    <label>Estado Civil</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="civilState">
                </div>
              </div>

              <div class="row">
                <div class="col-md-5">
                    <label>Morada</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="address">
                </div>
                <div class="col-md-3">
                    <label>Código Postal</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0">
                </div>
                <div class="col-md-4">
                    <label>Localidade</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="town">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                    <label>Concelho</label>
                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="parish">
                </div>
                <div class="col-md-3">
                  <label>Distrito</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" list="lista-distritos" name="district_id">
                  <datalist id="lista-distritos">
                    @foreach($districts as $district)
                      <option value="{{ $district->id }}">
                          {{ $district->name }}
                      </option>
                    @endforeach
                  </datalist>
                </div>
                <div class="col-md-3">
                  <label>Contacto</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="phoneNumber">
                </div>
                <div class="col-md-3">
                  <label>Email</label>
                  <input type="email" class="form-control border-top-0 border-left-0 border-right-0" name="email">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <label>Observações</label>
                    <textarea class="form-control" rows="5" name="observations"></textarea>
                </div>
              </div>
              <a class="float-right text-info" href="#">Preenchimento automático</a>
            </div>
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

              <label>Género</label>
              <input class="form-control border-top-0 border-left-0 border-right-0" type="text" list="lista-generos" name="gender_id">
              <datalist id="lista-generos" >
                @foreach($genders as $gender)
                  <option value="{{ $gender->id }}">
                      {{ $gender->name }}
                  </option>
                @endforeach
              </datalist>

             <div class="form-group">
                <label class="bmd-label-floating label-create-form">Genero</label>
                <select name="gender_id" class="custom-select border-top-0 border-left-0 border-right-0">
                    @foreach($genders as $gender)
                          <option value="{{ $gender->id }}">
                              {{ $gender->name }}
                          </option>
                      @endforeach
                </select>
              </div> 

              <label>Estado Civil</label>
              <datalist id="civil">
                <option value="Solteiro/a">
                <option value="Casado/a">
                <option value="Viuvo/a">
                <option value="Outro">
              </datalist>
              <input list="civil" class="form-control border-top-0 border-left-0 border-right-0">
              <label>Situação Face ao Emprego</label>
              <input type="text" class="form-control border-top-0 border-left-0 border-right-0" list="lista-situacoes" name="unemployement_situation_id">
              <datalist id="lista-situacoes">
                @foreach($unemployementSituations as $unemployementSituation)
                  <option value="{{ $unemployementSituation->id }}">
                      {{ $unemployementSituation->name }}
                  </option>
                @endforeach
              </datalist>
              <label>Habilitação Literárias</label>
              <input type="text" class="form-control border-top-0 border-left-0 border-right-0" list="list-habilitacoes" name="education_id">
              <datalist id="lista-situacoes">
                @foreach($educations as $education)
                  <option value="{{ $education->id }}">
                      {{ $education->name }}
                  </option>
                @endforeach
              </datalist>
              <label>Escola de proveniência</label>
              <input type="text" class="form-control border-top-0 border-left-0 border-right-0" list="lista-escolas" name="provenance_school_id">
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
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                <h4 class="card-title">Dados de Candidatura</h4>
              </div>
            </div>
            <div class="card-body">
              <label>Curso 1ª Opção</label>
              <input list="turma" class="form-control border-top-0 border-left-0 border-right-0" list="lista-cursos1" name="first_option_course_id">
              <datalist id="lista-cursos1">
                @foreach($courses as $course)
                  <option value="{{ $course->id }}">
                      {{ $course->name }}
                  </option>
                @endforeach
              </datalist>
              <label>Curso 2ª Opção</label>
              <input list="turma" class="form-control border-top-0 border-left-0 border-right-0" list="lista-cursos2" name="second_option_course_id">
              <datalist id="lista-cursos2">
                @foreach($courses as $course)
                  <option value="{{ $course->id }}">
                      {{ $course->name }}
                  </option>
                @endforeach
              </datalist>
              <div class="row">
                <div class="col-md-6">
                  <label>Data de Candidatura</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="applicationDate">
                </div>
                <div class="col-md-6">
                  <label>Data de Anulação</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Origem</label>
                  <input list="lista-origens" class="form-control border-top-0 border-left-0 border-right-0" name="origin_id">
                  <datalist id="lista-origens">
                    @foreach($origins as $origin)
                      <option value="{{ $origin->id }}">
                          {{ $origin->name }}
                      </option>
                    @endforeach
                  </datalist>
                </div>
                <div class="col-md-6">
                  <label>Motivo da Anulação</label>
                  <input class="form-control border-top-0 border-left-0 border-right-0" list="lista-motivos" name="cancellation_reason_id">
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
