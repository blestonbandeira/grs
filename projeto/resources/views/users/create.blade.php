@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="accordion" id="users">
          <div class="card">
            <div class="card-header card-header-info" data-toggle="collapse" data-target="#usersCreate" aria-expanded="true" aria-controls="usersCreate">
                <h4 class="card-title">Criar Novo Utilizador</h4>
            </div>

            <div class="card-body">
                <div class="row">                
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nome Completo</label>
                            <input type="text" class="form-control input-border-width" name="name">
                        </div>
                    </div>
                </div>
                <div class="row">                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Email</label>
                            <input type="text" class="form-control input-border-width" name="name">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                  <div>
                    <label class="label-create-form pb-2">Nível de Acesso</label>
                    <select name="permission_level" class="custom-select input-border-width">
                        @foreach($permissionLevels as $permissionLevel)
                              <option value="{{ $perssionLevel->name }}">
                                  {{ $permissionLevel->name }}
                              </option>
                          @endforeach
                    </select>
                  </div>
                </div>

                
            </div>
        </div>
      </div>           
    </div>
  </div>
</div>

            
@endsection
