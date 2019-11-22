@extends('layouts.app')

@section('content')

<div class="content">
  <div class="container-fluid">
    <form action="/applicants/{{ $applicant->id }}" method="post">
      @csrf
      @method('PUT')
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
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="name" value="{{ $applicant->name }}">
                </div>
                <div class="col-md-3">
                  <label>Email</label>
                  <input type="email" class="form-control border-top-0 border-left-0 border-right-0" name="email" value="{{ $applicant->email }}">
                </div>
                <div class="col-md-2">
                  <label>Contacto</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="phoneNumber" value="{{ $applicant->phoneNumber }}">
                </div>

                <div class="col-md-2">
                  <label>Data-de-Nascimento</label>
                  @if($applicant->birthdate != null)
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="birthdate" format="dd/MM/yyyy" value="{{ Carbon\Carbon::parse($applicant->birthdate)->format('Y-m-d') }}">
                  @else
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="birthdate" format="dd/MM/yyyy" value="">
                  @endif
                </div>
              </div>

              <div class="row pb-5">
                <div class="col-md-2">
                  <label>Género</label>
                  <select name="gender_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($genders as $gender)
                      @if($gender->id == $applicant->gender_id)
                        <option selected="selected" value="{{ $gender->id }}">
                            {{ $gender->name }}
                        </option>
                      @else
                        <option value="{{ $gender->id }}">
                            {{ $gender->name }}
                        </option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2">
                  <label>N. Contribuinte</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="nif" value="{{ $applicant->nif }}">
                </div>
                <div class="col-md-2">
                  <label>N. CC</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="identityCard" value="{{ $applicant->identityCard }}">
                </div>
                <div class="col-md-2">
                  <label>Data de Validade</label>
                  @if($applicant->ccExpirationDate != null)
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="ccExpirationDate" value="{{ Carbon\Carbon::parse($applicant->ccExpirationDate)->format('Y-m-d') }}">
                  @else
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="ccExpirationDate" format="dd/MM/yyyy" value="">
                  @endif

                </div>
                <div class="col-md-2">
                  <label>Estado Civil</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="civilState" value="{{ $applicant->civilState }}">
                </div>
                <div class="col-md-2">
                  <label>Naturalidade</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="birthtown" value="{{ $applicant->identityCard }}">
                </div>
                </div>

              <div class="row pb-5">
                <div class="col-md-2">
                  <label>Nacionalidade</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="nationality" value="{{ $applicant->nationality }}">
                </div>
                <div class="col-md-4">
                  <label>Morada</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="address" value="{{ $applicant->address }}">
                </div>
                <div class="col-md-2">
                  <label>Código Postal</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="postalCode" value="{{ $applicant->postalCode }}">
                </div>
                <div class="col-md-2">
                  <label>Localidade</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="town" value="{{ $applicant->town }}">
                </div>
                <div class="col-md-2">
                  <label>Concelho</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="parish" value="{{ $applicant->parish }}">
                </div>


              </div>
              <div class="row pb-5">
                <div class="col-md-2">
                  <label>Distrito</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="district_id">
                    @foreach($districts as $district)
                    @if($district->id == $applicant->district_id)
                        <option selected="selected" value="{{ $district->id }}">
                            {{ $district->name }}
                        </option>
                      @else
                        <option value="{{ $district->id }}">
                            {{ $district->name }}
                        </option>
                      @endif
                    @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                  <label>Situação Face ao Emprego</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="unemployement_situation_id">
                    @foreach($unemployementSituations as $unemployementSituation)
                    @if($unemployementSituation->id == $applicant->unemployementSituation_id)
                        <option selected="selected" value="{{ $unemployementSituation->id }}">
                            {{ $unemployementSituation->name }}
                        </option>
                      @else
                        <option value="{{ $unemployementSituation->id }}">
                            {{ $unemployementSituation->name }}
                        </option>
                      @endif
                    @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                  <label>Habilitação Literárias</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="education_id">
                    @foreach($educations as $education)
                      @if($education->id == $applicant->education_id)
                        <option selected="selected" value="{{ $education->id }}">
                            {{ $education->name }}
                        </option>
                      @else
                        <option value="{{ $education->id }}">
                            {{ $education->name }}
                        </option>
                      @endif
                    @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                  <label>Escola de proveniência</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="provenance_school_id">
                  @foreach($provenance_schools as $provenance_school)
                    @if($provenance_school->id == $applicant->provenance_school_id)
                      <option selected="selected" value="{{ $provenance_school->id }}">
                          {{ $provenance_school->name }}
                      </option>
                    @else
                      <option value="{{ $provenance_school->id }}">
                          {{ $provenance_school->name }}
                      </option>
                    @endif
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="row pb-5">
                <div class="col-md-12">
                  <label>Observações</label>
                    <textarea class="form-control" rows="5" name="observations" value="{{ $applicant->observations }}"></textarea>
                </div>
              </div>
              {{-- <a class="float-right text-info" href="#">Preenchimento automático</a> --}}
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
                  <select id="courseSelected" onchange="rsClassAppear(this.value)" name="first_option_course_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($courseNames as $courseName)
                      @if($applicant->first_option_course_id == $courseName->id)
                        <option selected="selected" value="{{ $courseName->id }}">
                            {{ $courseName->name }}
                        </option>
                      @else
                        <option value="{{ $courseName->id }}">
                            {{ $courseName->name }}
                        </option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Turma de Recrutamento</label>
                  <select id="rsClassName" name="rs_class_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Curso 2ª Opção</label>
                  <select id="secondOptionCourse" name="second_option_course_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                  </select>
                </div>
              </div>

              <div class="row pb-5">
                <div class="col-md-3">
                  <label>Data de Candidatura</label>
                  <input type="date" value="{{ Carbon\Carbon::parse($applicant->applicationDate)->format('Y-m-d') }}" class="form-control border-top-0 border-left-0 border-right-0" name="applicationDate">
                </div>
                <div class="col-md-3">
                  <label>Origem</label>
                  <select name="origin_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($origins as $origin)
                      @if($applicant->origin_id == $origin->id)
                        <option selected="selected" value="{{ $origin->id }}">
                            {{ $origin->name }}
                        </option>
                      @else
                        <option value="{{ $origin->id }}">
                            {{ $origin->name }}
                        </option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Data de Anulação</label>
                  @if($applicant->cancellationDate != null)
                  <input type="date" value="{{ Carbon\Carbon::parse($applicant->cancellationDate)->format('Y-m-d') }}" class="form-control border-top-0 border-left-0 border-right-0" name="cancellationDate">
                  @else
                  <input type="date" value="" class="form-control border-top-0 border-left-0 border-right-0" name="cancellationDate">
                  @endif

                </div>
                <div class="col-md-3">
                  <label>Motivo da Anulação</label>
                  <select name="cancellation_reason_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @if($applicant->cancellation_reason_id == null)
                      <option selected="selected" value>
                          Candidatura não anulada.
                      </option>
                    @endif
                    @foreach($cancellationReasons as $cancellationReason)
                      @if($applicant->cancellation_reason_id == $cancellationReason->id)
                        <option selected="selected" value="{{ $cancellationReason->id }}">
                            {{ $cancellationReason->name }}
                        </option>
                      @else
                        <option value="{{ $cancellationReason->id }}">
                          {{ $cancellationReason->name }}
                        </option>
                      @endif
                    @endforeach
                  </select>
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
                                  <option>---Selecione um resultado-</option>
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
      <button type="submit" id="submitButton" onclick="this.disabled=true;this.form.submit();" class="btn btn-info pull-right">Gravar</button>
    </form>
  </div>
</div>



<script>
  rsClassAppear("{{$applicant->first_option_course_id}}")
  secondCourse();
  function rsClassAppear(data)
  {
    document.getElementById('rsClassName').innerHTML = "";
    @foreach($courseArray as $value)
      if(data == "false"){
        document.getElementById('rsClassName').innerHTML = "<option>-- selecione primeiro o nome do Curso --</option>";
      }
      if("{{ $value['courseId'] }}" == data){
        document.getElementById('rsClassName').innerHTML += "<option value=' {{$value['classId']}} '> {{$value['className']}} </option>";
      }
    @endforeach
    secondCourse(data)
  }

  function secondCourse(data)
  {
    document.getElementById('secondOptionCourse').innerHTML = "";
    document.getElementById('secondOptionCourse').innerHTML = "<option>-- selecione aqui o nome do Curso --</option>  ";
    @foreach($courseArray as $value)
      if("{{ $value['courseId'] }}" == "{{$applicant->second_option_course_id}}"){
        document.getElementById('secondOptionCourse').innerHTML += "<option selected='selected' value=' {{$value['courseId']}} '> {{$value['courseName']}} </option>";
      }
      if("{{ $value['courseId'] }}" != data){
        document.getElementById('secondOptionCourse').innerHTML += "<option value=' {{$value['courseId']}} '> {{$value['courseName']}} </option>";
      }
    @endforeach
  }
</script>
@endsection
