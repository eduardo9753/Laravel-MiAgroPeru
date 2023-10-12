<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    MiAgroPeru
@endsection



@section('header')
    <div id="" class="header">
        <div class="mi-contenedor header-descripcion">
            <h1 class="espacio-arriba">MiAgroPeru - La plataforma de los agricultores peruanos</h1>
            <p class="mt-5 mb-3">Una iniciativa que impulsa los productos de nuestros agricultores peruanos.
                Regístrate en nuestro portal y comparte tus productos para que puedan ponerse en contacto contigo.
            </p>
            @guest
                <a href="{{ route('register') }}" class="btn-header">Quiero Registrarme</a>
            @endguest
        </div>
    </div>
@endsection



@section('contenido')
    <section id="nosotros" class="nosotros">
        <div class="mi-contenedor">
            <div class="flex-evenly">
                <div class="descripcion-nosotros">
                    <h2 class="titulo-nosotros text-center py-3">MiAgroPeru</h2>
                    <div class="flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Inscríbete en nuestra plataforma</p>
                    </div>
                    <div class="flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Ingresa tus datos personales</p>
                    </div>
                    <div class="flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Presenta tus productos en nuestro sitio web</p>
                    </div>
                    <div class="flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Comunicación directa con tus potenciales compradores</p>
                    </div>
                </div>

                <div class="imagen-nosotros">
                    <img src="https://images.pexels.com/photos/4207910/pexels-photo-4207910.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="imagen-nosotros" alt="">
                </div>
            </div>
        </div>
    </section>


    <section class="fondo-agricultura" id="fondo-agricultura">
        <div class="mi-contenedor">
            <div class="">
                <h3 class="titulo-fondo-agricultura">Lo mejor de la <span class="">Agricultura
                        Peruana</span></h3>
            </div>
        </div>
    </section>

    <section class="publicacion">
        <div class="mi-contenedor">
            <!--COMPONENTE ULTIMA PUBLICACION-->
            <x-ultimo-post :ultimoPost="$ultimoPost" />
        </div>
    </section>
@endsection



@section('footer')
    @guest
        <footer>
            <nav class="navegacion">
                <div class="mi-contenedor flex-between">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/logos/logo.png') }}" alt=""></a>
                    </div>

                    <ul class="flex-between gap-3">
                        <li class="link-menu"><a href="{{ route('login') }}" class="link">Login</a></li>
                        <li class="link-menu"><a href="{{ route('register') }}" class="link">Registrarme</a></li>
                    </ul>
                </div>
            </nav>
        </footer>
    @endguest
@endsection
