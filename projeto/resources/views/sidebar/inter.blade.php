<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    
    <div class="logo">
        <a href="#" class="simple-text logo-normal"> Entrevistador </a>
    </div>    

    <div class="sidebar-wrapper">

        <ul id="nav" class="nav">
            <li id="btnCalendar" class="nav-item">
            <a class="nav-link" href="{{ route('calendars.index') }}">
                <i class="material-icons">dashboard</i>
                <p>Calendário | Disponibilidade</p>         
            </a>
            </li>

                
        </ul>
    </div>
</div>