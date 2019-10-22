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
        <li class="nav-item active">
        {{-- <a class="nav-link" href="#"> --}}
        <a class="nav-link" href="{{ route('calendar.index') }}">
            <i class="material-icons">dashboard</i>
            <p>Calendário</p>
        </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="{{ route('applicants.index') }}">
        {{-- <a class="nav-link" href="#"> --}}
            <i class="material-icons">person</i>
            <p>Candidatos</p>
        </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="material-icons">content_paste</i>
            <p>Turmas</p>
        </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="material-icons">library_books</i>
            <p>Entrevistadores</p>
        </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="material-icons">bubble_chart</i>
            <p>Assistentes</p>
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

<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("nav");
    var btns = header.getElementsByClassName("nav-item");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>