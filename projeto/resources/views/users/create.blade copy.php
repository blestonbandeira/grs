@extends('layouts.app')
@section('content')

<div class="content">
  <div class="container-fluid">
        <form action="/users" method="POST">            
            @csrf
            <div class="row">
                
                <div class="col-md-12">
                    <div class="accordion" id="users">
                        <div class="card">
                            <div class="card-header card-header-info" data-toggle="collapse" data-target="#usersCreate" aria-expanded="true" aria-controls="usersCreate">
                                <h4 class="card-title">Criar Novo Utilizador</h4>
                            </div>

                            <br/>
                            <div class="card-body">
                
                                <div class="row justify-content-md-center">                
                                    <div class="col-md-10">

                                        <div class="form-group" >
                                            <label class="bmd-label-floating" name="name">Nome Completo</label>
                                            <input class="form-control input-border-width" name="name" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-md-center">                
                                    <div class="col-md-5">

                                        <div class="form-group">
                                            <label class="bmd-label-floating" name="password">Password</label>
                                            <input class="form-control input-border-width" name="password" type="password">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-5">

                                        <div class="form-group">
                                            <label class="bmd-label-floating" name="password">Repita a password</label>
                                            <input class="form-control input-border-width" name="password" type="password">
                                        </div>
                                    </div>
                                </div>
                                <br/>

                                <div class="row justify-content-md-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" name="email">Email</label>
                                            <input class="form-control input-border-width" name="email" type="text">
                                        </div>
                                    </div>
                                    
                            
                                    <div class="col-md-4">
                                        <div>
                                        <label class="border-top-0 border-left-0 border-right-0" name="name">Nível de Acesso</label>
                                        <select>
                                            @if (count($permissionLevels) > 0 )
                                                <option>-- selecione aqui o nível de acesso --</option>                                                        
                                                @foreach($permissionLevels as $permissionLevel)
                                                    <option value="{{ $permissionLevel->id }}">
                                                        {{ $permissionLevel->name  }}
                                                </option>
                                                @endforeach
                                            @else
                                                <option>
                                                    --Não existem níveis de acesso na plataforma--
                                                </option>
                                            @endif
                                        </select>                                            
                                              
                                    </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Criar</button>
                                        
                                    </div>
                                </div>
                            </div>           
                        </div>
                    </div>
                </div>                
                
            </div>
        </form>
    </div>
</div>


            
@endsection
