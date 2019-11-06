@extends('layouts.app')

@section('content')
{{-- <div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h2>Create Page</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card" style="padding: 30px;">
                <div class="card-body">
                    
                    <form action="/applicants" method="post">
                      @csrf
                          <div class="form-group">
                              <label for="name">name</label>
                              <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                          </div>
                          <div class="form-group">
                              <label for="startBid">email</label>
                              <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                          </div>
                          <div class="form-group">
                              <label for="img">town</label>
                              <input type="text" class="form-control" id="town" aria-describedby="emailHelp" name="town">
                          </div>
                          <button type="submit" class="btn btn-primary">Create</button>
                      </form>          
                  </div>                           
              </div>
          </div>
      </div>
  </div> --}}


  <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <form action="/applicants" method="post">
              @csrf
              <div class="card">
                <div class="card-header card-header-info">
                  <button class="card-title btn btn-link">Registo de Candidato</button>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-5">
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
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome Completo</label>
                          <input type="text" class="form-control input-border-width" name="name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating bg-white">Data-de-Nascimento</label>
                          <input type="date" class="form-control input-border-width" format="dd/MM/yyyy"">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">N. Contribuinte</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">N. CC</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating bg-white">Data de Validade</label>
                          <input type="date" class="form-control input-border-width">
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
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Distrito</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating" name="email">Contacto</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control input-border-width">
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
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Documentos entregues:</label>
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
                  <button type="submit" class="btn btn-info pull-right">Criar</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
