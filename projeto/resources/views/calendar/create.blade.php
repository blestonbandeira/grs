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
                    
                    <form action="/calendar" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">email</label>
                            <input type="text" class="form-control" id="description" aria-describedby="emailHelp" name="description">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>          
                </div>                           
            </div>
        </div>
    </div>
</div>
@endsection
