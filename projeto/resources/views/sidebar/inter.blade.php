<div class="wrapper ">
    <div class="sidebar" data-color="00A3E0" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    
    <div class="logo">
        <a href="#" class="simple-text logo-normal"> Entrevistador </a>
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
                                Entrevistas por realizar
                                </a>
                            </li>                              
                        </ul>                                        
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>