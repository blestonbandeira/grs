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
                        {{-- <label class="form-control border-0">{{ $applicant->gender->name }}</label> --}}
                        <label class="form-control border-0">{{ $applicant->gender_id }}</label>
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
                        <label class="form-control border-0">{{ $applicant->district_id }}</label>
                        {{-- <label class="form-control border-0">{{ $applicant->district->name }}</label> --}}
                      </div>
                      <div class="col-md-3">
                        <label>Situação Face ao Emprego</label>
                        <label class="form-control border-0">{{ $applicant->unemployementSituation_id }}</label>
                        {{-- <label class="form-control border-0">{{ $applicant->unemployementSituation->name }}</label> --}}
                      </div>
                      <div class="col-md-3">
                        <label>Habilitação Literárias</label>
                        <label class="form-control border-0">{{ $applicant->education_id }}</label>
                        {{-- <label class="form-control border-0">{{ $applicant->education->name }}</label> --}}
                      </div>
                      <div class="col-md-4">
                        <label>Escola de proveniência</label>
                        <label class="form-control border-0">{{ $applicant->provenance_id }}</label>
                        {{-- <label class="form-control border-0">{{ $applicant->provenance_school->name }}</label> --}}
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
                                    <label class="form-control border-0">{{ $applicant->first_option_course_id }}</label>
                                </div>
        
                                <div class="col-md-4">
                                    <label>Turma de Recrutamento</label>
                                    <label class="form-control border-0">{{ $applicant->rs_class_id }}</label>
                                </div>
                        
                                <div class="col-md-4">
                                    <label>Curso 2ª Opção</label>
                                    <label class="form-control border-0">{{ $applicant->second_option_course_id }}</label>
                                </div>
                            </div>
        
                            <div class="row pb-5">
                                <div class="col-md-3">
                                    <label>Data de Candidatura</label>
                                    <label class="form-control border-0">{{ $applicant->applicationDate }}</label>
                                </div>
                                <div class="col-md-3">
                                    <label>Origem</label>
                                    {{-- <label class="form-control border-0">{{ $applicant->origin->name }}</label> --}}
                                    <label class="form-control border-0">{{ $applicant->origin_id }}</label>
                                </div>
                                <div class="col-md-3">
                                    <label>Data de Anulação</label>
                                    <input type="date" class="form-control border-top-0 border-left-0 border-right-0"  name="cancellationDate">
                                </div>
                                <div class="col-md-3">
                                    <label>Motivo da Anulação</label>
                                    {{-- <label class="form-control border-0">{{ $applicant->cancellationReason->name }}</label> --}}
                                    <label class="form-control border-0">{{ $applicant->cancellationReason_id }}</label>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>


@endsection