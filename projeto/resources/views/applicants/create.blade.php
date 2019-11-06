@extends('layouts.app')

@section('content')
<div class="container" >
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
  </div>


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
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" id="name" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control input-border-width">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" class="form-control input-border-width">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" class="form-control input-border-width">
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
