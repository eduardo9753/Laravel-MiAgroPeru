<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    MiAgroPeru
@endsection



@section('header')
    <div id="" class="header">
        <div class="mi-contenedor header-descripcion">
            <h1 class="espacio-arriba">MiAgroPeru - La Plataforma de los Agricultores Peruanos</h1>
            <p class="mt-5">Una Iniciativa que promueve los productos de nuestros Agricultores Peruanos</p>
            <p class="mb-5">Registrate en Nuestro Portal y publica tus Productos para que puedan contactarte</p>
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
                        <p>Registrate en nuestro Portal</p>
                    </div>
                    <div class="flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Completa Tus datos Personales</p>
                    </div>
                    <div class="flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Publica tus productos en nuestra web</p>
                    </div>
                    <div class="flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Contacto directo con tus compradores</p>
                    </div>
                </div>

                <div class="imagen-nosotros">
                    <img src="{{ asset('img/nosotros.jpg') }}" class="imagen-nosotros" alt="">
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
@endsection
