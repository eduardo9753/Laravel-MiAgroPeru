<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Buscar Productos
@endsection




@section('contenido')
    <section class="publicacion">
        <div class="mi-contenedor">

            @if ($posts->count())
                <div class="padding-arriba">
                    <h3 class="titulo-publicacion">Ultima Publicación </h3>
                </div>
                <div class="grid-tres">
                    @foreach ($posts as $post)
                        <div class="contenido-publicacion">
                            <div class="descripcion-imagen">
                                <a href="{{ route('posts.show', ['user' => $post->username, 'post' => $post]) }}" class="center">
                                    <img class="imagen-home" src="{{ asset('uploads/' . $post->imagen) }}"
                                        alt="Titulo {{ $post->titulo }}">
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
                                    <a href=" {{ route('posts.index', $post->username) }}">
                                        {{ $post->username }}</a>
                                </div>

                                <div class="flex">
                                    <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'></i></span>
                                    <a target="_blank"
                                        href="https://wa.me/51{{ $post->celular }}?text=Quisiera más información del producto - Nombre:{{ $post->titulo }} - {{ $post->descripcion }}"
                                        class="boton texto-boton-general ">{{ $post->celular }}</a>
                                </div>

                                <div class="flex">
                                    <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                                    <p>{{ $post->titulo }}</p>
                                </div>

                                <div class="flex">
                                    <span class=""><i class='bx bx-dollar'></i></span>
                                    <p>{{ $post->precio }}</p>
                                </div>

                                <div class="flex">
                                    <span class=""><i class='bx bx-paragraph'></i></span>
                                    <p>{{ $post->descripcion }}</p>
                                </div>

                                <div class="flex">
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
                <div class="text-center">{{ $posts->withQueryString()->links() }}</div>
            @else
                <h2 class="text-center padding-arriba">Producto No encontrado</h2>
            @endif

        </div>
    </section>
@endsection
