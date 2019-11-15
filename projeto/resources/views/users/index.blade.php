@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">     
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="users">               
                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#{{ $rsclass->name }}" aria-expanded="true" aria-controls="{{ $rsclass->name }}">
                            <h4 class="card-title">Utilizadores</h4>
                                
                        </div>

                        <div id="{{ $rsclass->name }}" class="collapse" aria-labelledby="headingOne" data-parent="#rsclasses">
                            <div class="card-body table-responsive">                                
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Categorização</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($applicants as $applicant)
                                            @if($rsclass->id == $applicant->id_rsClass)
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input applicantsSelect" type="checkbox" value="{{$applicant->id}}">
                                                                <span class="form-check-sign">
                                                                <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $applicant->id }}
                                                    </td>
                                                    <td>
                                                        {{ $applicant->name }}
                                                    </td>

                                                    <td>
                                                        {{ $applicant->category }}
                                                    </td>
                                                    <td class="d-flex">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-link btn-sm">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <form action="/applicants/{{ $applicant->id }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" rel="tooltip" title="Remove" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
       
        <div class="pagination-sm float-right">
            
        </div>
    </div>
</div>


@endsection