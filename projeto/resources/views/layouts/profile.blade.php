@extends('layouts.app')
@section('content')
{{-- {{ dd($user) }} --}}
    <div class=" row justify-content-center">           
        <div class="col-md-5">
                <div class="card card-profile">
                    <div class="card-header card-header-text card-header-info">
                        <div class="card-text">
                            <h4 class="card-title">O Seu Perfil de Utilizador</h4>
                        </div>
                    </div>
                    
                    <div class="card-body">
        
                        <label >Nome do Utilizador</label> <br><label class="card-title">{{ $user->name }}</label ><br><br>

                        <label>Email</label> <br><label class="card-title">{{ $user->email }}</label><br>

                    </div>
                    
                </div>
            </div>
        </div>                
    </div>                
    
@endsection