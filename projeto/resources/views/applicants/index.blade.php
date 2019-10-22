@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-left">
                        <h2></h2>
                    </div>
                    <div class="col text-right">
                        <a href="/applicants/create"><button type="button" class="btn btn-primary">NEW</button></a>
                    </div>
                </div>

</hr>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        NAME
                                    </th>
                                    <th>
                                        EMAIL
                                    </th>
                                    <th>
                                        TOWN
                                    </th>
                                    <th>
                                        do
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applicants as $applicant)
                                <tr>
                                    <td>
                                        {{$applicant->id}}
                                    </td>
                                    <td>
                                        <a href="{{ url('/applicants/' . $applicant->id ) }}">{{$applicant->name}}</a>
                                    </td>
                                    <td>
                                        {{ Str::limit($applicant->email, 30)}}
                                    </td>
                                    <td>
                                        {{$applicant->town}}
                                    </td>
                                    <td>
                                        <form action="/applicants/{{ $applicant->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger btn-sm" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
