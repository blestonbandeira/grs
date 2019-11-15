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

            <br/>
            <div class="card-body">
                <div class="row">                
                    <div class="col-md-8">
                    <div>
                            <label class="bmd-label-floating" name="email">Nome Completo</label>
                            <input class="form-control input-border-width" type="text">
                        </div>
                    </div>
                </div>
                <br/>

                <div class="row">
                    <div class="col-md-8">
                        <div>
                            <label class="bmd-label-floating" name="email">Email</label>
                            <input class="form-control input-border-width" type="text">
                        </div>
                    </div>
                    
               
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nível de Acesso</label>
                            <select name="permission_level" class="custom-select input-border-width">
                                @foreach($permissionLevels as $permissionLevel)
                                    <option value="{{ $permissionLevel->name }}">
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
</div>

            
@endsection
