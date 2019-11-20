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
                  <input type="text" class="form-control border-top-0 border-left-0 border-right-0" name="phoneNumber" value="{{ $applicant->email }}">
                </div>

                <div class="col-md-2">
                  <label>Data-de-Nascimento</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="birthdate" format="dd/MM/yyyy" value="{{ $applicant->birthdate }}">
                </div>
              </div>

              <div class="row pb-5">
                <div class="col-md-2">
                  <label>Genero</label>
                  <select name="gender_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($genders as $gender)
                      <option value="{{ $applicant->gender_id }}">
                          {{ $gender->name }}
                      </option>
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
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="ccExpirationDate" value="{{ $applicant->ccExpirationDate }}">
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
                      <option value="{{ $applicant->district_id }}">
                          {{ $district->name }}
                      </option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                  <label>Situação Face ao Emprego</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="unemployement_situation_id">
                    @foreach($unemployementSituations as $unemployementSituation)
                      <option value="{{ $applicant->unemployement_situation_id }}">
                          {{ $unemployementSituation->name }}
                      </option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                  <label>Habilitação Literárias</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="education_id">
                    @foreach($educations as $education)
                      <option value="{{ $applicant->education_id }}">
                          {{ $education->name }}
                      </option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                  <label>Escola de proveniência</label>
                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="provenance_school_id">
                    @foreach($provenance_schools as $provenance_school)
                      <option value="{{ $applicant->provenance_school_id }}">
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
                  <label>Turma de Recrutamento</label>
                  <select name="rs_class_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($rsclasses as $rsclass)
                      <option value="{{ $applicant->rs_class_id }}">
                          {{ $rsclass->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Curso 1ª Opção</label>
                  <select name="first_option_course_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($courseNames as $courseName)
                      <option value="{{ $applicant->first_option_course_id }}">
                          {{ $courseName->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Curso 2ª Opção</label>
                  <select name="second_option_course_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($courseNames as $courseName)
                      <option value="{{ $applicant->second_option_course_id }}">
                          {{ $courseName->name }}
                      </option>
                    @endforeach
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
                    @foreach($origins as $origin)
                      <option value="{{ $applicant->origin_id }}">
                          {{ $origin->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label>Data de Anulação</label>
                  <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="cancellationDate">
                </div>
                <div class="col-md-3">
                  <label>Motivo da Anulação</label>
                  <select name="cancellation_reason_id" class="custom-select border-top-0 border-left-0 border-right-0 input-height">
                    @foreach($cancellationReasons as $cancellationReason)
                      <option value="{{ $applicant->cancellation_reason_id }}">
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
                                  <option>Aceite (1)</option>
                                  <option>Aceite (1)</option>
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
                                    <select class="custom-select input-height border-top-0 border-left-0 border-right-0 " name="interview">
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
                                  <td><label class="pr-3">Apridão Numérica</label></td>
                                  <td><select class="custom-select input-height border-top-0 border-left-0 border-right-0 " name="interview">
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
                                  <td><select class="custom-select input-height  border-top-0 border-left-0 border-right-0 " name="interview">
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
                                  <td><select class="custom-select input-height border-top-0 border-left-0 border-right-0 " name="interview">
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
                                <tr>
                                    <td><br></td>
                                    <td><br></td>
                                  </tr>
                                <tr>
                                  <td><label class="pr-3 text-info">Média dos Testes</label></td>
                                  <td class="text-center"><label class="pr-3 text-info">22</label></td>
                                </tr>
                              </table>
                          </div>
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
  
                  {{-- <div>
                    <input class="checkbox" type="hidden" name="appForm" value="0">
                    <input class="form-check-sign" type="checkbox" name="appForm" value="1" checked>
                    <label>Formulário de Inscrição</label>
                  </div> --}}
  
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
      <button type="submit" class="btn btn-info pull-right">Criar</button>
    </form>
  </div>
</div>



@endsection
