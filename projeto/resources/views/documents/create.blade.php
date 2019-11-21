@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="card">

    <div class="card-body">
          
      <form action="{{ url('documents') }}" method="post" enctype="multipart/form-data" name="fileUpload">
        @csrf
        <div class="form-group">
          
          <select class="custom-select">
            @if (count($documentTypes) > 0 )
              <option>
                -- selecione o tipo de documento --
              </option>
                @foreach($documentTypes as $documentType)
                    <option value="{{$documentType}}">
                        {{ $documentType->name }}
                    </option>
                @endforeach
            @else
              <option>
                  --Não existem opções disponíveis--
              </option>
            @endif
          </select>

          <select class="custom-select">
            @if (count($applicants) > 0 )
              <option>
                -- selecione o candidato --
              </option>
                @foreach($applicants as $applicant)
                    <option value="{{$applicant}}">
                        {{ $applicant->name }}
                    </option>
                @endforeach
            @else
              <option>
                  --Não existem candidatos com esse documento em falta--
              </option>
            @endif
          </select>
         
        </div>
        <label for="Ficheiro">Ficheiro</label>
        <br />
        <input type="file" class="form-control-file" name="file" id="file" aria-describedby="fileHelp" multiple/>
        <small id="fileHelp" class="form-text text-muted">Seleccione um documento para carregar.</small>
        <br /><br />
        <button type="submit" class="btn btn-primary">Submeter</button>
        
      </form>
    </div>
  </div>
</div>


@endsection