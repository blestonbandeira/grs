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
              <div class="row pb-5">

                <div class="col-md-5">
                  <label>Nome Completo</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="name">
                </div>
                <div class="col-md-3">
                  <label>Email</label>
                  <input type="email" class="form-control border-top-0 border-left-0 border-right-0" name="email">
                </div>
                <div class="col-md-2">
                  <label>Contacto</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="phoneNumber">
                </div>

                <div class="col-md-2">
                  <label>Data de Nascimento</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="birthdate" format="dd/MM/yyyy">
                </div>
              </div>

              <div class="row pb-5">
                <div class="col-md-2">
                  <label>Género</label>
                  <select name="gender_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($genders as $gender)
                      <option value="{{ $gender->id }}">
                          {{ $gender->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2">
                  <label>Número de Contribuinte</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="nif">
                </div>
                <div class="col-md-2">
                  <label>Número do Cartão de Cidadão</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="identityCard">
                </div>
                <div class="col-md-2">
                  <label>Data de Validade do Cartão de Cidadão</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="ccExpirationDate">
                </div>
                <div class="col-md-2">
                  <label>Estado Civil</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="civilState">
                </div>
                <div class="col-md-2">
                  <label>Naturalidade</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="birthtown">
                </div>
                </div>

              <div class="row pb-5">
                <div class="col-md-2">
                  <label>Nacionalidade</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="nationality">
                </div>
                <div class="col-md-4">
                  <label>Morada</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="address">
                </div>
                <div class="col-md-2">
                  <label>Código Postal</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="postalCode">
                </div>
                <div class="col-md-2">
                  <label>Localidade</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="town">
                </div>
                <div class="col-md-2">
                  <label>Concelho</label>
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="parish">
                </div>


              </div>
              <div class="row pb-5">
                <div class="col-md-2">
                  <label>Distrito</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="district_id">
                    {{-- <option>-- selecione aqui o Distrito --</option> --}}
                    <option> </option> 
                    @foreach($districts as $district)
                      <option value="{{ $district->id }}">
                          {{ $district->name }}
                      </option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                  <label>Situação Face ao Emprego</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="unemployement_situation_id">
                    {{-- <option>-- selecione aqui a Situação Face ao Emprego --</option>   --}}
                    <option> </option> 
                    @foreach($unemployementSituations as $unemployementSituation)
                      <option value="{{ $unemployementSituation->id }}">
                          {{ $unemployementSituation->name }}
                      </option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                  <label>Habilitações Literárias</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="education_id">
                    {{-- <option>-- selecione aqui as Habilitações Literárias --</option>   --}}
                    <option> </option> 
                    @foreach($educations as $education)
                      <option value="{{ $education->id }}">
                          {{ $education->name }}
                      </option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                  <label>Escola de proveniência</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="provenance_school_id">
                    {{-- <option>-- selecione aqui o nome da Escola --</option>   --}}
                    <option> </option> 
                    @foreach($provenance_schools as $provenance_school)
                      <option value="{{ $provenance_school->id }}">
                          {{ $provenance_school->name }}
                      </option>
                    @endforeach
                    </select>
                </div>
              </div>
              <div class="row pb-5">
                <div class="col-md-12">
                  <label>Observações</label>
                    <textarea class="form-control" rows="5" name="observations"></textarea>
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
                  <select onchange="rsClassAppear(this.value)" name="first_option_course_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    <option value="false">-- selecione aqui o nome do Curso --</option>  
                    @foreach($courseArray as $value)
                      <option value="{{ $value['courseId'] }}" >
                          {{ $value['courseName'] }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-4">
                  <label>Turma de Recrutamento</label>
                  <select id="rsClassName" name="rs_class_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    <option>-- selecione primeiro o nome do Curso --</option>
                  </select>
                </div>
                
                <div class="col-md-4">
                  <label>Curso 2ª Opção</label>
                  <select id="secondOptionCourse" name="second_option_course_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    <option>-- selecione aqui o nome do Curso --</option>  
                  </select>
                </div>
              </div>

              <div class="row pb-5">
                <div class="col-md-3">
                  <label>Data de Candidatura</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="applicationDate">
                </div>
                <div class="col-md-3">
                  <label>Origem</label>
                  <select name="origin_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    {{-- <option>-- selecione aqui a Origem --</option> --}}
                    <option> </option> 
                    @foreach($origins as $origin)
                      <option value="{{ $origin->id }}">
                          {{ $origin->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Data de Anulação</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0"  name="cancellationDate">
                </div>
                <div class="col-md-3">
                  <label>Motivo da Anulação</label>
                  <select name="cancellation_reason_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    {{-- <option>-- selecione aqui o Motivo da Anulação --</option> --}}
                    <option> </option> 
                    @foreach($cancellationReasons as $cancellationReason)
                      <option value="{{ $cancellationReason->id }}">
                          {{ $cancellationReason->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 justify-content-center">
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
                  {{-- é preciso fazer aqui validações: o atestado médico e o data assessment são só para alguns cursos, tenho de ir ver quais --}}
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
                </label><br><br>
              </div>

            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-info pull-right" id="submitButton" onclick="this.disabled=true;this.form.submit();">Criar</button>
    </form>
  </div>
</div>


<script>
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
      if("{{ $value['courseId'] }}" != data){
        document.getElementById('secondOptionCourse').innerHTML += "<option value=' {{$value['courseId']}} '> {{$value['courseName']}} </option>";
      }
    @endforeach
  }
</script>
      

@endsection
