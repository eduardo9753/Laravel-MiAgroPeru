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
                <a href="{{ route('register') }}" class="btn btn-success btn-lg">Quiero Registrarme</a>
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
                    <div class="d-flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Inscríbete en nuestra plataforma</p>
                    </div>
                    <div class="d-flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Ingresa tus datos personales</p>
                    </div>
                    <div class="d-flex">
                        <span class="check-nosotros"><i class='bx bx-check bx-tada bx-rotate-90'></i></span>
                        <p>Presenta tus productos en nuestro sitio web</p>
                    </div>
                    <div class="d-flex">
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


    <section>
        <div class="" id="contenido-bloques">
            <div class="mi-contenedor">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="mi-card">
                            <div class="mi-card-content">
                                <h2 class="contenido-bloques-titulo">Registrate!</h2>
                                <div class="text-center">
                                    <img class="imagen" src="https://cdn-icons-png.flaticon.com/512/4116/4116368.png"
                                        alt="">
                                </div>
                                <p class="contenido-bloques-parrafo">Regístrate proporcionando tus datos personales en
                                    nuestra plataforma para disfrutar de la red social de MiagroPerú y acceder a una
                                    variedad de servicios.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="mi-card">
                            <div class="mi-card-content">
                                <h2 class="contenido-bloques-titulo">Publica!</h2>
                                <div class="text-center">
                                    <img class="imagen" src="https://cdn-icons-png.flaticon.com/512/8644/8644426.png"
                                        alt="">
                                </div>
                                <p class="contenido-bloques-parrafo">Comparte tus productos para alcanzar a un público más
                                    amplio y promocionarlos en nuestra plataforma.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="mi-card">
                            <div class="mi-card-content">
                                <h2 class="contenido-bloques-titulo">Enlaza!</h2>
                                <div class="text-center">
                                    <img class="imagen" src="https://cdn-icons-png.flaticon.com/512/3201/3201615.png"
                                        alt="">
                                </div>
                                <p class="contenido-bloques-parrafo">Sigue a nuevos usuarios para mantenerte actualizado con
                                    productos novedosos de diversos sectores y rangos de precios.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="mi-card">
                            <div class="mi-card-content">
                                <h2 class="contenido-bloques-titulo">Busca Productos!</h2>
                                <div class="text-center">
                                    <img class="imagen" src="https://cdn-icons-png.flaticon.com/512/3649/3649291.png"
                                        alt="">
                                </div>
                                <p class="contenido-bloques-parrafo">Explora productos de tu interés y obtén acceso a la
                                    información de contacto de la persona que los publicó en la plataforma.</p>
                            </div>
                        </div>
                    </div>
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


    <section class="publicacion mt-5">
        <div class="mi-contenedor">
            <!--COMPONENTE ULTIMA PUBLICACION-->
            <x-ultimo-post :ultimoPost="$ultimoPost" />
        </div>
    </section>



    <section class="" id="buscador">
        <div class="mi-contenedor">
            <h3>Buscar Productos</h3>
            {{-- COMPONENTE LIVEWIRE BUSCADOR --}}
            @livewire('search')
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
                        <li class="link-menu"><a href="{{ route('login') }}" class="">Login</a></li>
                        <li class="link-menu"><a href="{{ route('register') }}" class="">Registrarme</a></li>
                    </ul>
                </div>
            </nav>
        </footer>
    @endguest
@endsection
