<nav class="nav justify-content-between menu-nav menu_desplegable_navbar mt-2 mb-3"
    style="background-color:rgba(0,0,0,.7)   ">

    <a class="text-light font-weight-bol" href="/">Inicio</a>
    <a class="text-light font-weight-bol" href="/carreras">Carreras</a>
    <a class="text-light font-weight-bol" href="/noticias">Noticias</a>
    <a class="text-light font-weight-bol" href="/productos">Productos</a>
    <a class="text-light font-weight-bol" href="/contact">Contacto</a>

    @if (session()->has('user'))
        @if (!empty(session('user')))
            @if (session('user')->type_user == 'C')
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session('user')->firstname }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/mis_carreras">Mis Carreras</a>
                        <a class="dropdown-item" href="/carrito">Carrito</a>
                        <a class="dropdown-item" href="/show_usuario/{{ session('user')->id }}">Mi cuenta</a>
                        <a class="dropdown-item" href="/logout">Salir</a>

                    </div>
                </div>
            @else
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session('user')->firstname }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/usuarios">Usuarios</a>
                        <a class="dropdown-item" href="/show_usuario/{{ session('user')->id }}">Mi cuenta</a>
                        <a class="dropdown-item" href="/mis_carreras">Mis Carreras</a>
                        <a class="dropdown-item" href="/carrito">Carrito</a>
                        <a class="dropdown-item" href="/logout">Salir</a>
                    </div>
                </div>
            @endif
        @else
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Anonimo
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/login">Log in</a>
                    <a class="dropdown-item" href="/register">Registre</a>
                </div>
            </div>
        @endif
    @else
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Anonimo
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/login">Log in</a>
                <a class="dropdown-item" href="/register">Registre</a>
            </div>
        </div>

    @endif

</nav>
