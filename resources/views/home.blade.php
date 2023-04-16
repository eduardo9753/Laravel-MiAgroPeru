<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    MiAgroPeru
@endsection



{{--
@section('franja')
    <div class="franja flex-between">
        <div class="redes-sociales flex-between">
            <div class="facebook">
                <i class='bx bxl-facebook'></i>
            </div>
            <div class="instagram">
                <i class='bx bxl-instagram'></i>
            </div>
        </div>

        <div>
            <h1 class="titulo-franja-logo">MiAgroPeru</h1>
        </div>

        <div class="contactos">
            <div class="whatsaap">
                <i class='bx bxl-whatsapp bx-tada'></i> <span class="numero-whatsapp">+51 922 394 642</span>
            </div>
        </div>
    </div>
@endsection
--}}




@section('header')
    <div id="" class="header">
        <div class="mi-contenedor header-descripcion">
            <h1 class="">MiAgroPeru - La Plataforma de los Agricultores Peruanos</h1>
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
                        <p>Realiza una Publicacion de tu Producto</p>
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
            <div>
                <h3 class="titulo-publicacion">PUBLICACION RECIENTE</p>
                </h3>
            </div>
            <div class="center">
                <div class="contenido-publicacion tamanio-publicacion">
                    @if ($posts)
                        <div class="descripcion-imagen">
                            <img class="imagen-home" src="{{ asset('uploads/' . $posts->imagen) }}" alt="">
                            <div class="flex-between py-3">
                                <div class="flex">
                                    <span class=""><i class='bx bxs-heart' style='color:#ef0d0d'></i></span>

                                    <p>{{ $like }}</p>

                                </div>

                                {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                                {{-- SETEAMOS LA FECHA CON CARBON --}}
                                {{-- <p> {{ \Carbon\Carbon::parse($posts->fechaRegistroPost)->diffForHumans() --}}</p>
                                <p>{{ $posts->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <div class="descripcion-publicacion">
                            <div class="flex">
                                <span class=""><i class='bx bx-user'></i></span>
                                <a href=" {{ route('posts.index', $posts->user) }}">
                                    {{ $posts->user->username }}</a>
                            </div>

                            <div class="flex">
                                <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'></i></span>
                                <p class="">{{ $posts->user->celular }}</p>
                            </div>

                            <div class="flex">
                                <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                                <p>{{ $posts->titulo }}</p>
                            </div>

                            <div class="flex">
                                <span class=""><i class='bx bx-dollar'></i></span>
                                <p>{{ $posts->precio }}</p>
                            </div>

                            <div class="flex">
                                <span class=""><i class='bx bx-paragraph'></i></span>
                                <p>{{ $posts->descripcion }}</p>
                            </div>

                            <div class="flex">
                                <span class=""></span>
                                {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                                {{-- SETEAMOS LA FECHA CON CARBON --}}
                                {{-- <p> {{ \Carbon\Carbon::parse($posts->fechaRegistroPost)->diffForHumans() }}</p> --}}
                                <p>{{ $posts->created_at->diffForHumans() }}</p>
                            </div>

                            <div>
                                @guest
                                    <p class="text-center mt-5">Para darle Like - Registrate en el Portal</p>
                                @endguest

                                @guest
                                    <div class="text-center my-4">
                                        <a href="{{ route('register') }}" class="">Quiero Registrarme</a>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    @else
                        <h2>Registrate en el Portal para Publicar tus Productos</h2>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
