<div class="wrapper " style="position: absolute;">
    <div class="sidebar" data-color="#00A3E0" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
        -->
        <div class="logo">
            <a href="#">
                <img class="logoStyle" src="{{ asset('images/onlinelogomaker-103119-1759-6926.png') }}" alt="logo">
            </a>
        </div>   
            
        <div class="sidebar-wrapper">
            <div class="accordion nav" id="sidebar">            

                <div class="card nav-item">
                    <div class="card-header" id="headingOne">
                        <i class="material-icons">person</i>
                        <p data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="{{ request()->is('applicants*') ? 'activeMenu' : '' }}">
                            <a href="{{ url('applicants')}}">
                                Candidatos
                            </a>
                        </p>
                    </div>
                    <div id="collapseOne" class="collapse {{ request()->is('applicants*') ? ' show' : '' }}" aria-labelledby="headingOne" data-parent="#sidebar">
                    <div class="card-body">
                        <ul class="nav-item">
                            <li class="{{ request()->is('applicants') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('applicants') }}">
                                Ver  
                                </a>
                            </li>
                            <li class="{{ request()->is('applicants/create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('applicants.create') }}">
                                Adicionar
                                </a>   
                            </li>                             
                        </ul> 
                    </div>
                    </div>
                </div>

                <div class="card nav-item">
                    <div class="card-header" id="headingTwo">
                        <i class="material-icons">dashboard</i>
                        <p data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="{{ request()->is('calendars*') ? 'activeMenu' : '' }}">
                            <a href="{{ url('calendars') }}">
                                Calendários
                            </a>
                        </p>
                    </div>

                    <div id="collapseTwo" class="collapse {{ request()->is('calendars*') ? ' show' : '' }}" aria-labelledby="headingTwo" data-parent="#sidebar">
                        <div class="card-body">
                            <ul class="nav-item">
                            <li class="{{ request()->is('calendars') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('calendars') }}">
                                    Todos 
                                    </a>
                                </li>
                                <li class="{{ request()->is('calendars/interviews') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('calendars/interviews') }}">
                                    Entrevistas 
                                    </a>
                                </li> 
                                <li class="{{ request()->is('calendars/tests') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('calendars/tests') }}">
                                        Provas de Selecção
                                    </a>
                                </li>                             
                                <li class="{{ request()->is('calendars/availabilities') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('calendars/availabilities') }}">       
                                        Disponibilidades
                                    </a>  
                                </li>         
                            </ul>                                        
                        </div>
                    </div>
                </div>

                <div class="card nav-item">
                    <div class="card-header" id="headingThree">
                        <i class="material-icons">content_paste</i>
                        <p data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="{{ request()->is('rsclasses*') ? 'activeMenu' : '' }}">
                            <a href="{{ url('rsclasses') }}">
                            Turmas
                            </a>
                        </p>                
                    </div>
                    <div id="collapseThree" class="collapse {{ request()->is('rsclasses*') ? ' show' : '' }}" aria-labelledby="headingThree" data-parent="#sidebar">
                        <div class="card-body">
                            <ul class="nav-item">
                                <li class="{{ request()->is('rsclasses') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('rsclasses') }}">
                                    Ver  
                                    </a>
                                </li>
                                <li class="{{ request()->is('rsclasses/create') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('rsclasses.create') }}">
                                    Adicionar
                                    </a>   
                                </li>                           
                            </ul>                
                        </div>
                    </div>
                </div>

                <div class="card nav-item">
                    <div class="card-header" id="headingFour">
                        <i class="fas fa-book"></i>
                        <p data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="{{ request()->is('courses*') ? 'activeMenu' : '' }}">
                            <a href="{{ url('courses') }}">
                            Cursos
                            </a>
                        </p>                
                    </div>
                    <div id="collapseFour" class="collapse {{ request()->is('courses*') ? ' show' : '' }}" aria-labelledby="headingFour" data-parent="#sidebar">
                        <div class="card-body">
                        <ul class="nav-item">
                                <li class="{{ request()->is('courses') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('courses') }}">
                                    Ver  
                                    </a>
                                </li>
                                <li class="{{ request()->is('courses/create') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('courses.create') }}">
                                    Adicionar
                                    </a>   
                                </li>                           
                            </ul>                  
                        </div>
                    </div>
                </div>

                <div class="card nav-item">
                    <div class="card-header" id="headingFive">
                        <i class="material-icons">bubble_chart</i>
                        <p data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive" class="{{ request()->is('users*') ? 'activeMenu' : '' }}">
                            <a href="{{ url('users') }}">
                            Utilizadores
                            </a>
                        </p>                
                    </div>
                    <div id="collapseFive" class="collapse {{ request()->is('users*') ? ' show' : '' }}" aria-labelledby="headingFive" data-parent="#sidebar">
                        <div class="card-body">
                            <ul class="nav-item">
                                <li class="{{ request()->is('users') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('users') }}">
                                    Ver  
                                    </a>
                                </li>
                                <li class="{{ request()->is('users/create') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('users.create') }}">
                                    Adicionar
                                    </a>   
                                </li>                           
                            </ul>             
                        </div>
                    </div>
                </div>

                <div class="card nav-item">
                    <div class="card-header" id="headingSix">
                        <i class="fas fa-book"></i>
                        <p data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="{{ request()->is('documents*') ? 'activeMenu' : '' }}">
                            <a href="{{ url('documents')}}">
                            Documentos
                            </a>
                        </p>                
                    </div>
                    <div id="collapseSix" class="collapse {{ request()->is('documents*') ? ' show' : '' }}" aria-labelledby="headingFive" data-parent="#sidebar">
                        <div class="card-body">
                        <ul class="nav-item">
                                <li class="{{ request()->is('documents') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('documents') }}">
                                    Ver  
                                    </a>
                                </li>
                                <li class="{{ request()->is('documents/create') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('documents.create') }}">
                                    Adicionar
                                    </a>   
                                </li>                           
                            </ul>                  
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>