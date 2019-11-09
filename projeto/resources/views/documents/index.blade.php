@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="card">

    <div class="card-body">
            @if ($message = Session::get('success'))
 
                <div class="alert alert-success alert-block">
 
                    <button type="button" class="close" data-dismiss="alert">×</button>
 
                    <strong>{{ $message }}</strong>
 
                </div>
            @endif
 
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
      <form action="{{ url('documents') }}" method="post" enctype="multipart/form-data" name="fileUpload">
        @csrf
        <div class="form-group">
          <label for="Tipo de Ficheiro"> dropdown para tipo de ficheiro</label>
          <input type="text" name="name" class="form-control"  placeholder="Tipo de Ficheiro" >
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