<div class="wrapper" style="position: absolute;">  
    <div class="sidebar" data-color="#00A3E0" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
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
            </div> 
        </div> 
    </div> 
</div>