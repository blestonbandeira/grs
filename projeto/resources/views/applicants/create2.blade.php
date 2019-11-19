@extends('layouts.app')

@section('content')

<div class="content">
  <div class="container-fluid">
    <form action="/applicants" method="post">
      @csrf
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header card-header-text card-header-info">
              <div class="card-text">
                <h4 class="card-title">Dados Pessoais</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  {{-- <div class="form-group"> --}}
                    <label>Turma de Recrutamento</label>
                    <select class="custom-select " style="height: 36px">
                      <option value="">ssdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff</option>
                    </select>
                  {{-- </div> --}}
                </div>
                <div class="col-md-6">
                  {{-- <div class="form-group"> --}}
                    <label for="">nome</label>
                    <input class="form-control pb-0 mb-0">
                  {{-- </div> --}}


                  
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
