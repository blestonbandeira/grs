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


                    
                <div class="container-fluid">
                    <div class="row">
                    @foreach ($applicants as $applicant)    
                        <div class="col-xl-2" style="margin: 5px; margin-bottom: 30px; padding: 10px; border-style: solid;border-color: rgb(0, 162, 255); border-radius: 7px; min-width: 14vw; word-wrap: break-word;">
                            <h2>
                                <a href="{{ url('/applicants/' . $applicant->id ) }}">{{$applicant->name}}</a>
                            </h2>
                            <p>
                                {{ Str::limit($applicant->email, 30)}}
                            </p>
                            <p>
                                <a class="btn btn-primary btn-sm" href="{{ url('/applicants/' . $applicant->id ) }}" role="button">Detalhes</a>
                            </p>
                        </div>
                    @endforeach
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
@endsection
