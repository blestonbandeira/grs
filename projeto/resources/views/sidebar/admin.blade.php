<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    
    <div class="logo">
        <img style="width: 100%;" src="{{ asset('images/onlinelogomaker-103119-1759-6926.png') }}" alt="logo">
    </div>   
           
    <div class="sidebar-wrapper">
        <div class="accordion nav" id="sidebar">
            
            <div class="card nav-item">
                <div class="card-header" id="headingOne">
                    <i class="material-icons">dashboard</i>
                    <p data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Calendário
                    </p>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#sidebar">
                    <div class="card-body nav-link">
                        <ul>
                            <a class="nav-link" href="{{ route('calendars.index') }}">
                                <li class="nav-item">Entrevistas</li>  
                            </a>
                            <a class="nav-link" href="#">
                                <li class="nav-item">Testes Psicotécnicos & Provas de Aferição</li> 
                            </a>
                            <a class="nav-link" href="#">           
                                <li class="nav-item">Testes Psicotécnicos & Inventário Vocacional</li>  
                            </a>          
                        </ul>                                        
                    </div>
                </div>
            </div>

            <div class="card nav-item">
                <div class="card-header" id="headingTwo">
                    <i class="material-icons">person</i>
                    <p data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Candidatos
                    </p>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#sidebar">
                <div class="card-body">
                    <ul>
                        <a class="nav-link" href="{{ route('applicants.index') }}">
                            <li class="nav-item">Ver</li>  
                        </a>
                        <a class="nav-link" href="{{ route('applicants.create') }}">
                            <li class="nav-item">Adicionar</li> 
                        </a>                               
                    </ul> 
                </div>
                </div>
            </div>

            <div class="card nav-item">
                <div class="card-header" id="headingThree">
                    <i class="material-icons">content_paste</i>
                    <p data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        Turmas
                    </p>                
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#sidebar">
                    <div class="card-body">
                        <ul>
                            <a class="nav-link" href="{{ route('rsclasses.index') }}">
                                <li class="nav-item">Ver</li>  
                            </a>
                            <a class="nav-link" href="{{ route('rsclasses.create') }}">
                                <li class="nav-item">Adicionar</li>    
                            </a>           
                        </ul>                
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFour">
                    <i class="material-icons">bubble_chart</i>
                    <p data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        Assistentes de Formação
                    </p>                
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#sidebar">
                    <div class="card-body">
                        <ul>
                            <a class="nav-link" href="{{ route('assistants.index') }}">
                                <li class="nav-item">Ver</li>  
                            </a>
                            <a class="nav-link" href="{{ route('assistants.create') }}">
                                <li class="nav-item">Adicionar</li>    
                            </a>           
                        </ul>                
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFive">
                    <i class="material-icons">library_books</i>
                    <p data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                        Entrevistadores
                    </p>                
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#sidebar">
                    <div class="card-body">
                        <ul>
                            <a class="nav-link" href="{{ route('interviewers.index') }}">
                                <li class="nav-item">Ver</li>  
                            </a>
                            <a class="nav-link" href="{{ route('interviewers.create') }}">
                                <li class="nav-item">Adicionar</li>    
                            </a>           
                        </ul>                
                    </div>
                </div>
            </div>

        </div> 
    </div>
</div>