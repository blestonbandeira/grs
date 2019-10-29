<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    
    <div class="logo">
        <a href="#" class="simple-text logo-normal"> Administrador </a>
    </div>          
    <div class="sidebar-wrapper">
    <ul id="nav" class="nav">
        <li id="btnCalendar" class="nav-item">
        {{-- <a class="nav-link" href="#"> --}}
        <a class="nav-link" href="{{ route('calendars.index') }}">
            <i class="material-icons">dashboard</i>
            <p>Calendário</p>         
        </a>
        </li>

        <li id="btnApplicant" class="nav-item">
        <span class="nav-link">
            <i class="material-icons">person</i>
            <p data-toggle="collapse" data-target="#applicant">Candidatos</p>
            <ul id="applicant" class="collapse">
                <a class="nav-link" href="{{ route('applicants.index') }}">
                    <li class="nav-item">Ver</li>  
                </a>
                <a class="nav-link" href="#">
                    <li class="nav-item">Adicionar</li> 
                </a>
                <a class="nav-link" href="#">
                    <li class="nav-item">Gerir</li>  
                </a>          
            </ul>
        </span>
        </li>

        <li id="btnClass" class="nav-item ">
        <a class="nav-link" href="#">
            <i class="material-icons">content_paste</i>
            <p data-toggle="collapse" data-target="#classes">Turmas</p>
            <ul id="classes" class="collapse">
                <a class="nav-link" href="#">
                    <li class="nav-item">Ver</li>  
                </a>
                <a class="nav-link" href="#">
                    <li class="nav-item">Adicionar</li>    
                </a>
                <a class="nav-link" href="#">
                    <li class="nav-item">Gerir</li> 
                </a>           
            </ul>
        </a>
        </li>
        
        <li id="btnInterviewer" class="nav-item ">
        <a class="nav-link" href="#">
            <i class="material-icons">library_books</i>
            <p data-toggle="collapse" data-target="#interviewers">Entrevistadores</p>
            <ul id="interviewers" class="collapse">
                <a class="nav-link" href="#">
                    <li class="nav-item">Ver</li>  
                </a>
                <a class="nav-link" href="#">
                    <li class="nav-item">Adicionar</li>    
                </a>
                <a class="nav-link" href="#">
                    <li class="nav-item">Gerir</li> 
                </a>           
            </ul>
        </a>
        </li>

        <li id="btnAssitant" class="nav-item ">
        <a class="nav-link" href="#">
            <i class="material-icons">bubble_chart</i>
            <p data-toggle="collapse" data-target="#assistants">Assistentes de Formação</p>
            <ul id="assistants" class="collapse">
                <a class="nav-link" href="#">
                    <li class="nav-item">Ver</li>  
                </a>
                <a class="nav-link" href="#">
                    <li class="nav-item">Adicionar</li>    
                </a>
                <a class="nav-link" href="#">
                    <li class="nav-item">Gerir</li> 
                </a>           
            </ul>
        </a>
        </li>

        {{-- <li class="nav-item ">
        <a class="nav-link" href="./map.html">
            <i class="material-icons">location_ons</i>
            <p>Maps</p>
        </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="./notifications.html">
            <i class="material-icons">notifications</i>
            <p>Notifications</p>
        </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="./rtl.html">
            <i class="material-icons">language</i>
            <p>RTL Support</p>
        </a>
        </li> --}}
            
        </ul>
    </div>
</div>