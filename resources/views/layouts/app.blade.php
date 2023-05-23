<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>MiAgroPeru - @yield('titulo')</title>

    <!--CSS Y ESTILOS TAILWIND.CSS CARPETA : "public/css/app.css"-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
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
    <link rel="stylesheet" href="{{ asset('css/responsive/nav.css') }}">


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

        
        {{-- NAVEGACION CON LOGEO --}}
        @auth
            <x-nav-auth />
        @endauth
        {{-- END NAVEGACION CON LOGEO --}}



        {{-- NAVEGACION SIN LOGEO --}}
        @guest
            <x-nav-guest />
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
    @guest
        <footer>
            <nav class="navegacion">
                <div class="mi-contenedor flex-between">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/logos/logo.png') }}" alt=""></a>
                    </div>

                    <ul class="flex-between gap-3">
                        <li class="link-menu"><a href="{{ route('login') }}" class="link">Publica tus productos
                                gratis</a></li>
                        <li class="link-menu"><a href="{{ route('register') }}" class="link">Registrarme</a></li>
                    </ul>
                </div>
            </nav>
        </footer>
    @endguest


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

{{-- SCRIPT LIVEWIRE --}}
@livewireScripts

</html>
