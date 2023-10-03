<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Buscar Productos
@endsection




@section('contenido')
    <section class="publicacion" id="busacdor">
        <div class="mi-contenedor">

            @if ($posts->count())
                <div>
                    <h3 class="titulo-publicacion espacio-arriba-titulos">Productos</h3>
                </div>
                <div class="grid-tres">
                    @foreach ($posts as $post)
                        <div class="contenido-publicacion ">
                            <div class="descripcion-imagen">
                                <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}" class="center">
                                    <img class="imagen-home" src="{{ asset('uploads/' . $post->imagen) }}"
                                        alt="Imagen del post {{ $post->titulo }}">
                                </a>
                                <div class="flex-between py-3">
                                    <div class="flex">
                                        <span class=""><i class='bx bxs-heart' style='color:#ef0d0d'></i></span>
                                        {{-- <p>{{ $likes }}</p> --}}
                                    </div>
                                    {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                                    {{-- SETEAMOS LA FECHA CON CARBON --}}
                                    {{-- <p> {{ \Carbon\Carbon::parse($post->fechaRegistroPost)->diffForHumans() }}</p> --}}
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="descripcion-publicacion">
                                <div class="flex">
                                    <span class=""><i class='bx bx-user'></i></span>
                                    <a href=" {{ route('posts.index', $post->user) }}">
                                        {{ $post->user->username }}</a>
                                </div>

                                <div class="flex">
                                    <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'></i></span>
                                    <a target="_blank"
                                        href="https://wa.me/51{{ $post->user->celular }}?text=Quisiera más información del producto - Nombre:{{ $post->titulo }} - {{ $post->descripcion }}"
                                        class="boton texto-boton-general ">{{ $post->user->celular }}</a>
                                </div>

                                <div class="flex">
                                    <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                                    <p>{{ $post->titulo }}</p>
                                </div>

                                <div class="flex">
                                    <span class="">S/</i></span>
                                    <p>{{ $post->precio }}</p>
                                </div>

                                <div class="flex">
                                    <span class="" style="color: rgba(0, 0, 0, 0.767)">Descripción: </span>
                                    <p>{{ $post->descripcion }}</p>
                                </div>

                                <div class="">
                                    <span class=""></span>
                                    {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                                    {{-- SETEAMOS LA FECHA CON CARBON --}}
                                    {{-- <p> {{ \Carbon\Carbon::parse($post->fechaRegistroPost)->diffForHumans() }}</p> --}}
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
                        </div>
                    @endforeach
                </div>
                {{ $posts->withQueryString()->links() }}
            @else
                <ul class="">
                    <div class="text-center">
                        <h2 class="text-center  espacio-arriba-titulos">Datos no encontramos</h2>
                        @guest
                            <li class="link-menu"><a href="{{ route('register') }}" class="link text-center">Registrarme</a>
                            </li>
                        @endguest
                    </div>
                </ul>
            @endif

        </div>
    </section>
@endsection
