<div class="wrapper ">
    <div class="sidebar" data-color="00A3E0" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
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
                    <p data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="{{ request()->is('calendars*') ? 'activeMenu' : '' }}">
                    Calendário
                    </p>
                </div>

                <div id="collapseOne" class="collapse {{ request()->is('calendars*') ? ' show' : '' }}" aria-labelledby="headingOne" data-parent="#sidebar">
                    <div class="card-body">
                        <ul class="nav-item">
                            <li class="{{ request()->is('calendars') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('calendars') }}">
                                Entrevistas 
                                </a>
                            </li> 
                            <li>
                                <a class="nav-link" href="#">
                                    Testes & Provas
                                </a>
                            </li> 
                            <li>
                                <a class="nav-link" href="#">           
                                    Testes & Inventário
                                </a>  
                            </li>          
                        </ul>                                        
                    </div>
                </div>
            </div>

            <div class="card nav-item">
                <div class="card-header" id="headingTwo">
                    <i class="material-icons">person</i>
                    <p data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" class="{{ request()->is('applicants*') ? 'activeMenu' : '' }}">
                    Candidatos
                    </p>
                </div>
                <div id="collapseTwo" class="collapse {{ request()->is('applicants*') ? ' show' : '' }}" aria-labelledby="headingTwo" data-parent="#sidebar">
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
                <div class="card-header" id="headingThree">
                    <i class="material-icons">content_paste</i>
                    <p data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="{{ request()->is('rsclasses*') ? 'activeMenu' : '' }}">
                        Turmas
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
        </div> 
    </div>
</div>