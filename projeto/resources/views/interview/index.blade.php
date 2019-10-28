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
                    
                    <form action="/interview" method="post">
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

<script>
    // Add active class to the current button (highlight it)
    try{
        var header = document.getElementById("nav");
        var btns = header.getElementsByClassName("nav-item");
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
    }
    catch(err){
        document.getElementById("btnApplicant").className += " active";
    }
    document.getElementById("btnApplicant").className += " active";
    
</script>
@endsection
