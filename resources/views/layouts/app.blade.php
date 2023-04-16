<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>MiAgroPeru - @yield('titulo')</title>

    <!--CSS Y ESTILOS TAILWIND.CSS CARPETA : "public/css/app.css"-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/generales.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/registro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post/create.css') }}">

    {{-- RESPONSE CSS --}}
    <link rel="stylesheet" href="{{ asset('css/responsive/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/auth.registro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/post.show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/generales.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/menu.css') }}">


    <!--JS  CARPETA : "public/js/app.js"-->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- ICONO DEL PROYECTO --}}
    <link rel="shortcut icon" href="{{ asset('img/logos/logo.png') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- GOOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    {{-- CDN BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- ESTILOS LIVEWIRE --}}
    @livewireStyles

</head>

<body>
    <header>
        {{-- FRANJA VERDE --}}
        @yield('franja')
        {{-- END FRANJA VERDE --}}



        <div class="mi-contenedor flex-between p-1 caja-menu-responsive">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logos/logo.png') }}" alt=""></a>
            </div>


            <div class="caja-menu ">
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn"><i class="bx bx-menu tamanio-menu"></i></label>
            </div>
        </div>

        {{-- NAVEGACION CON LOGEO --}}
        @auth
            <nav class="navegacion">
                <div class="mi-contenedor flex-evenly">

                    {{-- CREAR MENU AMBURQUESA CON JAVASCRIPT --}}
                    <ul class="flex-between ">
                        <li class="link-menu"><a href="{{ route('posts.publicacion') }}" class="link my-1">Publicaciones</a>
                        </li>
                        {{-- LE PASAMOS TODA LA VARIABLE USUARIO INICIADA QUE REQUIERE "posts.index" --}}
                        <li class="link-menu"><a href="{{ route('posts.index', auth()->user()) }}" class="link my-1">
                                {{ auth()->user()->username }}</a></li>
                        <li class="link_menu my-1"><a href="{{ route('posts.create') }}"
                                class="crear-boton crear color-blanco crear-boton-espacio"><i class='bx bx-camera bx-tada'></i></a></li>
                        <li class="link_menu my-1"><a href="{{ route('posts.desarrollador') }}"
                                class="crear-boton crear color-blanco crear-boton-espacio"><i class='bx bxs-face bx-tada'></i></a></li>
                        <li class="link-menu my-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="crear-boton salir color-blanco crear-boton-espacio"><i
                                        class='bx bx-exit bx-tada'></i></button>
                            </form>
                        </li>

                    </ul>
                </div>
            </nav>
        @endauth
        {{-- END NAVEGACION CON LOGEO --}}



        {{-- NAVEGACION SIN LOGEO --}}
        @guest
            <nav class="navegacion">
                <div class="mi-contenedor flex-between">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/logos/logo.png') }}" alt=""></a>
                    </div>

                    <ul class="flex-between gap-3">
                        <li class="link-menu"><a href="{{ route('login') }}" class="link">Ingresar</a></li>
                        <li class="link-menu"><a href="{{ route('register') }}" class="link">Registrarme</a></li>
                    </ul>
                </div>
            </nav>
        @endguest
        {{-- END NAVEGACION SIN LOGEO --}}


        {{-- HEADER --}}
        @yield('header')
        {{-- END HEADER --}}
    </header>



    {{-- MAIN HTML --}}
    <main>
        <!--CONTENIDO GENERAL DE TODAS LAS PAGINAS-->
        @yield('contenido')
    </main>


    {{-- FOOTER HTML --}}


</body>

{{-- CDN JS BOOTSTRAP --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
{{-- CDN JQUERY --}}
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
{{-- CARGA DE IMAGEN CDN --}}
<script src="{{ asset('js/cargarImagen.js') }}" defer></script>
<script src="{{ asset('js/cargarImagenPublicacion.js') }}" defer></script>
<script src="{{ asset('js/menu.js') }}" defer></script>
{{-- SCRIPT LIVEWIRE --}}
@livewireScripts

</html>
