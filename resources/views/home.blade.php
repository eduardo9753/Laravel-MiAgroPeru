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

            <div class="center">
                <div class="contenido-publicacion tamanio-publicacion">
                    @if ($ultimoPost)
                        <div>
                            <h3 class="titulo-publicacion">Ultima Publicación </h3>
                        </div>
                        {{-- @foreach ($ultimoPost as $ultimoPost) --}}
                        <div class="descripcion-imagen">
                            <img class="imagen-home" src="{{ asset('uploads/' . $ultimoPost->imagen) }}" alt="">
                            <div class="flex-between py-3">
                                <div class="flex">
                                    <span class=""><i class='bx bxs-heart' style='color:#ef0d0d'></i></span>

                                    {{-- <p>{{ $likes }}</p> --}}

                                </div>

                                {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                                {{-- SETEAMOS LA FECHA CON CARBON --}}
                                {{-- <p> {{ \Carbon\Carbon::parse($ultimoPost->fechaRegistroPost)->diffForHumans() }}</p> --}}
                                <p>{{ $ultimoPost->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <div class="descripcion-publicacion">
                            <div class="flex">
                                <span class=""><i class='bx bx-user'></i></span>
                                <a href=" {{ route('posts.index', $ultimoPost->user) }}">
                                    {{ $ultimoPost->user->username }}</a>
                            </div>

                            <div class="flex">
                                <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'></i></span>
                                <a target="_blank"
                                    href="https://wa.me/51{{ $ultimoPost->user->celular }}?text=Quisiera más información del producto - Nombre:{{ $ultimoPost->titulo }} - {{ $ultimoPost->descripcion }}"
                                    class="boton texto-boton-general ">{{ $ultimoPost->user->celular }}</a>
                            </div>

                            <div class="flex">
                                <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                                <p>{{ $ultimoPost->titulo }}</p>
                            </div>

                            <div class="flex">
                                <span class=""><i class='bx bx-dollar'></i></span>
                                <p>{{ $ultimoPost->precio }}</p>
                            </div>

                            <div class="flex">
                                <span class=""><i class='bx bx-paragraph'></i></span>
                                <p>{{ $ultimoPost->descripcion }}</p>
                            </div>

                            <div class="flex">
                                <span class=""></span>
                                {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                                {{-- SETEAMOS LA FECHA CON CARBON --}}
                                {{-- <p> {{ \Carbon\Carbon::parse($ultimoPost->fechaRegistroPost)->diffForHumans() }}</p> --}}
                            </div>

                            <div>
                                @guest
                                    <p class="text-center mt-5">Para darle Like - Registrate en el Portal</p>
                                    <div class="text-center my-4">
                                        <a href="{{ route('register') }}" class="">Quiero Registrarme</a>
                                    </div>
                                @endguest
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    @else
                        <h2 class="text-center">Registrate y publica</h2>
                        <ul class="center gap-3">
                            <li class="link-menu"><a href="{{ route('register') }}"
                                    class="link text-center">Registrarme</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
