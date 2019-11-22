@extends('layouts.app')

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-text card-header-info">
                    <div class="card-text">
                      <h4 class="card-title">Dados Pessoais</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row pb-5">

                      <div class="col-md-5">
                        <label>Nome Completo</label>
                        <label class="form-control border-0">{{ $applicant->name }}</label>
                      </div>
                      <div class="col-md-3">
                        <label>Email</label>
                        <label class="form-control border-0">{{ $applicant->email }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>Contacto</label>
                        <label  class="form-control border-0">{{ $applicant->phoneNumber }}</label>
                      </div>

                      <div class="col-md-2">
                        <label>Data-de-Nascimento</label>
                        <label class="form-control border-0">{{ $applicant->birthdate }}</label>
                      </div>
                    </div>

                    <div class="row pb-5">
                      <div class="col-md-2">
                        <label>Género</label>
                        <label class="form-control border-0">{{ DB::table('genders')->where('id', $applicant->gender_id )->value('name') }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>N. Contribuinte</label>
                        <label class="form-control border-0">{{ $applicant->nif }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>N. CC</label>
                        <label class="form-control border-0">{{ $applicant->identityCard }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>Data de Validade</label>
                        <label class="form-control border-0">{{ $applicant->ccExpirationDate }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>Estado Civil</label>
                        <label class="form-control border-0">{{ $applicant->civilState }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>Naturalidade</label>
                        <label class="form-control border-0">{{ $applicant->birthtown }}</label>
                      </div>
                    </div>
                    <div class="row pb-5">
                      <div class="col-md-2">
                        <label>Nacionalidade</label>
                        <label class="form-control border-0">{{ $applicant->nationality }}</label>
                      </div>
                      <div class="col-md-4">
                        <label>Morada</label>
                        <label class="form-control border-0">{{ $applicant->address }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>Código Postal</label>
                        <label class="form-control border-0">{{ $applicant->postalCode }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>Localidade</label>
                        <label class="form-control border-0">{{ $applicant->town }}</label>
                      </div>
                      <div class="col-md-2">
                        <label>Concelho</label>
                        <label class="form-control border-0">{{ $applicant->parish }}</label>
                      </div>
                    </div>

                    <div class="row pb-5">
                      <div class="col-md-2">
                        <label>Distrito</label>
                        <label class="form-control border-0">{{ DB::table('districts')->where('id', $applicant->district_id )->value('name') }}</label>
                      </div>
                      <div class="col-md-3">
                        <label>Situação Face ao Emprego</label>
                        {{-- <label class="form-control border-0">{{ $applicant->unemployementSituation_id }}</label> --}}
                        <label class="form-control border-0">{{ DB::table('unemployement_situations')->where('id', $applicant->unemployementSituation_id )->value('name') }}</label>
                      </div>
                      <div class="col-md-3">
                        <label>Habilitação Literárias</label>
                        <label class="form-control border-0">{{ DB::table('education')->where('id', $applicant->education_id )->value('name') }}</label>
                      </div>
                      <div class="col-md-4">
                        <label>Escola de proveniência</label>
                        <label class="form-control border-0">{{ DB::table('provenance_schools')->where('id', $applicant->provenance_id )->value('name') }}</label>
                      </div>
                    </div>
                    <div class="row pb-5">
                      <div class="col-md-12">
                        <label>Observações</label>
                        <p>{{ $applicant->observations }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-text card-header-info">
                            <div class="card-text">
                            <h4 class="card-title">Dados de Candidatura</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row pb-5">
                                <div class="col-md-4">
                                    <label>Curso 1ª Opção</label>
                                    <label class="form-control border-0">{{ DB::table('course_names')->where('id', $applicant->first_option_course_id )->value('name') }}</label>

                                </div>

                                <div class="col-md-4">
                                    <label>Turma de Recrutamento</label>
                                    <label class="form-control border-0">{{ DB::table('rs_classes')->where('id', $applicant->rs_class_id )->value('name') }}</label>
                                </div>

                                <div class="col-md-4">
                                    <label>Curso 2ª Opção</label>
                                    <label class="form-control border-0">{{ DB::table('course_names')->where('id', $applicant->second_option_course_id )->value('name') }}</label>
                                </div>
                            </div>

                            <div class="row pb-5">
                                <div class="col-md-3">
                                    <label>Data de Candidatura</label>
                                    <label class="form-control border-0">{{ $applicant->applicationDate }}</label>
                                </div>
                                <div class="col-md-3">
                                    <label>Origem</label>
                                    <label class="form-control border-0">{{ DB::table('origins')->where('id', $applicant->origin_id )->value('name') }}</label>
                                </div>
                                <div class="col-md-3">
                                    <label>Data de Anulação</label>
                                    <input type="date" class="form-control border-top-0 border-left-0 border-right-0"  name="cancellationDate">
                                </div>
                                <div class="col-md-3">
                                    <label>Motivo da Anulação</label>
                                    <label class="form-control border-0">{{ DB::table('cancellation_reasons')->where('id', $applicant->cancellationReason_id )->value('name') }}</label>
                                </div>
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
                          <h4 class="card-title">Resultados</h4>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-warning bg-none">
                                      <div class="card-text" style="box-shadow:none; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.4); border: 1px solid #00A3E0;">
                                        <h4 class="card-title" style="color:#00A3E0;">Entrevista</h4>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                      <select class="custom-select input-height border-top-0 border-left-0 border-right-0 " name="interview">
                                        {{-- <option>---Selecione um resultado-</option> --}}
                                        <option> </option>
                                        <option>Aceite (3)</option>
                                        <option>Aceite (2)</option>
                                        <option>Aceite (1)</option>
                                        <option>Aceite c/ reservas</option>
                                        <option>Não Aceite</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header card-header-text card-header-warning bg-none">
                                      <div class="card-text" style="box-shadow:none; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.4); border: 1px solid #00A3E0;">
                                        <h4 class="card-title" style="color:#00A3E0;">Prova de Aferição</h4>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                        <select class="custom-select input-height w-25 border-top-0 border-left-0 border-right-0 " name="interview">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                          <option>6</option>
                                          <option>7</option>
                                          <option>8</option>
                                          <option>9</option>
                                          <option>10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header card-header-text card-header-warning bg-none">
                                      <div class="card-text" style="box-shadow:none; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.4); border: 1px solid #00A3E0;">
                                        <h4 class="card-title" style="color:#00A3E0;">Inventário Vocacional</h4>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                        <select class="custom-select input-height w-25 border-top-0 border-left-0 border-right-0 " name="interview">
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                          <option>6</option>
                                          <option>7</option>
                                          <option>8</option>
                                          <option>9</option>
                                          <option>10</option>
                                        </select>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-text card-header-warning bg-none">
                                  <div class="card-text" style="box-shadow:none; box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.4); border: 1px solid #00A3E0;">
                                    <h4 class="card-title" style="color:#00A3E0;">Teste Psicoténicos</h4>
                                  </div>
                                </div>
                                <div class="card-body">
                                    <table>
                                      <tr>
                                        <th></th>
                                        <th></th>
                                      </tr>
                                      <tr style="height: 55px;">
                                        <td><label class="pr-3">Compreensão Verbal</label></td>
                                        <td>
                                          <select class="custom-select input-height border-top-0 border-left-0 border-right-0 " name="interview" id="verbal" onclick="updateMedia()">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                          </select>
                                        </td>
                                      </tr>
                                      <tr style="height: 55px;">
                                        <td><label class="pr-3">Apdidão Numérica</label></td>
                                        <td><select class="custom-select input-height border-top-0 border-left-0 border-right-0 " name="interview" id="numerica" onclick="updateMedia()">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                          </select></td>
                                      </tr>
                                      <tr style="height: 55px;">
                                        <td><label class="pr-3">Raciocínio Lógico</label></td>
                                        <td><select class="custom-select input-height  border-top-0 border-left-0 border-right-0 " name="interview" id="logico" onclick="updateMedia()">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                          </select> </td>
                                      </tr>
                                      <tr style="height: 55px;">
                                        <td><label class="pr-5">Raciocínio Espacial</label></td>
                                        <td><select class="custom-select input-height border-top-0 border-left-0 border-right-0 " name="interview" id="espacial" onclick="updateMedia()">
                                            <option>1</option>
                                            <option >2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                          </select> </td>
                                      </tr>
                                      <tr>
                                          <td><br></td>
                                          <td><br></td>
                                        </tr>
                                      <tr>
                                        <td><label class="pr-3 text-info">Média dos Testes</label></td>
                                        <td class="text-center"><label class="pr-3 text-info" id="media">0</label></td>
                                      </tr>
                                    </table>
                                </div>
                          </div>
                          </div>
                          </div>

                        <script>
                          var verbal = document.getElementById("verbal");
                          var numerica = document.getElementById("numerica");
                          var logico = document.getElementById("logico");
                          var espacial = document.getElementById("espacial");

                          function updateMedia() {
                            var op_v = parseInt(verbal.options[verbal.selectedIndex].text);
                            var op_n = parseInt(numerica.options[numerica.selectedIndex].text);
                            var op_l = parseInt(logico.options[logico.selectedIndex].text);
                            var op_e = parseInt(espacial.options[espacial.selectedIndex].text);

                            var media= ((op_v+op_n+op_l+op_e)/4);

                            var label_media = document.getElementById("media");
                            label_media.innerText = media;
                            }
                          </script>
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
                              <input class="form-check-input" type="checkbox" value="true">
                              Formulário de Inscrição
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label><br><br>
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="true">
                              BI/CC
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label><br><br>
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="true">
                              Certificado de Habilitações
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label><br><br>
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="true">
                              Cartão de Utente ou Declaração Centro de Emprego
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label><br><br>
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="true">
                              Curriculum Vitae
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label><br><br>
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="true">
                              Registo Criminal
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label><br><br>
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="true">
                              Atestado Médico
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label><br><br>
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="true">
                              Data Assessment
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <button class="btn btn-success pull-right" >Apto</button>

                      </div>
                    </div>
                  </div>
            </div>
      </div>
    </div>


@endsection