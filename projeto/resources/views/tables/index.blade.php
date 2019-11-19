@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">   
           
     
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="tablesShow">      
                  
                 
                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#provenance_schools" aria-expanded="true" aria-controls="provenance_schools">
                            <h4 class="card-title">Escolas de Proveniência</h4>
                            <p class="card-category"> Nº de Escolas:{{ count($provenanceSchools) }} </p> 
                        </div>
                        <div id="provenance_schools" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($provenanceSchools as $provenanceSchool)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$provenanceSchool->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $provenanceSchool->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $provenanceSchool->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $provenanceSchool->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $provenanceSchool->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#cancellation_reasons" aria-expanded="true" aria-controls="cancellation_reasons">
                            <h4 class="card-title">Motivos de Cancelamento</h4>
                            <p class="card-category"> Nº de Motivos:{{ count($cancellationReasons) }} </p> 
                        </div>
                        <div id="cancellation_reasons" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($cancellationReasons as $cancellationReason)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$cancellationReason->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $cancellationReason->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $cancellationReason->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $cancellationReason->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                              </td>
                                              <td>
                                                <form action="/tables/{{ $cancellationReason->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#categories" aria-expanded="true" aria-controls="categories">
                            <h4 class="card-title">Estado da Candidatura</h4>
                            <p class="card-category"> Nº de estados:{{ count($categories) }} </p> 
                        </div>
                        <div id="categories" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$category->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $category->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $category->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $category->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $category->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#classStates" aria-expanded="true" aria-controls="classStates">
                            <h4 class="card-title">Estado da Turma</h4>
                            <p class="card-category"> Nº de estados:{{ count($classStates) }} </p> 
                        </div>
                        <div id="classStates" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($classStates as $classState)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$classState->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $classState->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $classState->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $classState->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $classState->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#courseNames" aria-expanded="true" aria-controls="courseNames">
                            <h4 class="card-title">Nomes de Curso</h4>
                            <p class="card-category"> Nº de nomes:{{ count($courseNames) }} </p> 
                        </div>
                        <div id="courseNames" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                        
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($courseNames as $courseName)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$courseName->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $courseName->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $courseName->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $courseName->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $courseName->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#districts" aria-expanded="true" aria-controls="districts">
                            <h4 class="card-title">Distritos</h4>
                            <p class="card-category"> Nº de distritos:{{ count($districts) }} </p> 
                        </div>
                        <div id="districts" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($districts as $district)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$district->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $district->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $district->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $district->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $district->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#document_types" aria-expanded="true" aria-controls="document_types">
                            <h4 class="card-title">Tipos de Documentos</h4>
                            <p class="card-category"> Nº de tipos:{{ count($documentTypes) }} </p> 
                        </div>
                        <div id="document_types" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($documentTypes as $documentType)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$documentType->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $documentType->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $documentType->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $documentType->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $documentType->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#education" aria-expanded="true" aria-controls="education">
                            <h4 class="card-title">Habilitações Literárias</h4>
                            <p class="card-category"> Nº de habilitações:{{ count($educations) }} </p> 
                        </div>
                        <div id="education" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($educations as $education)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$education->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $education->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $education->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $education->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $education->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#event_types" aria-expanded="true" aria-controls="event_types">
                            <h4 class="card-title">Tipos de Evento</h4>
                            <p class="card-category"> Nº de tipos:{{ count($eventTypes) }} </p> 
                        </div>
                        <div id="event_types" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($eventTypes as $eventType)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$eventType->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $eventType->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $eventType->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $eventType->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $eventType->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#genders" aria-expanded="true" aria-controls="genders">
                            <h4 class="card-title">Géneros</h4>
                            <p class="card-category"> Nº de tipos:{{ count($genders) }} </p> 
                        </div>
                        <div id="genders" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($genders as $gender)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$gender->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $gender->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $gender->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $gender->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $gender->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#minimum_qualifications" aria-expanded="true" aria-controls="minimum_qualifications">
                            <h4 class="card-title">Habilitações Mínimas</h4>
                            <p class="card-category"> Nº de habilitações:{{ count($minimumQualifications) }} </p> 
                        </div>
                        <div id="minimumQualifications" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($minimumQualifications as $minimumQualification)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$minimumQualification->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $minimumQualification->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $minimumQualification->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $minimumQualification->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $minimumQualification->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                       
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#origins" aria-expanded="true" aria-controls="origins">
                            <h4 class="card-title">Origem</h4>
                           
                            <p class="card-category"> Nº de origens:{{ count($origins) }} </p> 
                        </div>
                        <div id="origins" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">
                                            <a href="{{ route('tables.index', ['order' => 'name']) }}" class="ftc-main">
                                                Nome
                                              <i class="grid-sort"></i>
                                            </a>
                                        </th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($origins as $origin)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$origin->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $origin->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $origin->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $origin->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $origin->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#permission_levels" aria-expanded="true" aria-controls="permission_levels">
                            <h4 class="card-title">Níveis de Acesso</h4>
                            <p class="card-category"> Nº de permissões:{{ count($permissionLevels) }} </p> 
                        </div>
                        <div id="permission_levels" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($permissionLevels as $permissionLevel)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$permissionLevel->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $permissionLevel->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $permissionLevel->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $permissionLevel->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $permissionLevel->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#regimes" aria-expanded="true" aria-controls="regimes">
                            <h4 class="card-title">Regime</h4>
                            <p class="card-category"> Nº de regimes:{{ count($regimes) }} </p> 
                        </div>
                        <div id="regimes" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($regimes as $regime)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$regime->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $regime->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $regime->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $regime->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $regime->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#test_types" aria-expanded="true" aria-controls="test_types">
                            <h4 class="card-title">Tipos de Provas</h4>
                            <p class="card-category"> Nº de tipos de provas:{{ count($testTypes) }} </p> 
                        </div>
                        <div id="test_types" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($testTypes as $testType)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$testType->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $testType->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $testType->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $testType->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $testType->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header card-header-info" data-toggle="collapse" data-target="#unemployement_situations" aria-expanded="true" aria-controls="unemployement_situations">
                            <h4 class="card-title">Situação Face ao Emprego</h4>
                            <p class="card-category"> Nº de situações:{{ count($unemployementSituations) }} </p> 
                        </div>
                        <div id="unemployement_situations" class="collapse" aria-labelledby="headingOne" data-parent="#tablesShow">
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-info">
                                        <th class="text-center"></th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>                                                                                
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                        
                                    </thead>
                                    <tbody>
                                        @foreach ($unemployementSituations as $unemployementSituation)
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="{{$unemployementSituation->id}}">
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $unemployementSituation->id }}
                                            </td>
                                            <td class="text-center">
                                                {{ $unemployementSituation->name }}
                                            </td>
                                           
                                             <td>
                                                <form action="/tables/{{ $unemployementSituation->id }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="button" rel="tooltip" title="Editar" class="btn btn-info btn-link btn-sm border-0">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </form>
                                             </td>
                                             <td>
                                                <form action="/tables/{{ $unemployementSituation->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" rel="tooltip" title="Remover" class="btn btn-info btn-link btn-sm" value="DELETE">
                                                        <i class="material-icons">close</i>
                                                    </button>
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
       
        <div class="pagination-sm float-right">
            
        </div>
    </div>
</div>


@endsection