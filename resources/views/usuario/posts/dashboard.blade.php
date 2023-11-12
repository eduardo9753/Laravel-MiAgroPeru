<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    {{ $user->username }}
@endsection


@section('contenido')
    <section class="publicacion-usuario" id="publicacion-perfil">
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="mi-contenedor center espacio-entre">
            <div class="publicacion-imagen">
                @if ($user->imagen)
                    <img src="{{ asset('perfiles/' . $user->imagen) }}" alt="">
                @else
                    <img src="{{ asset('img/usuario/usuario-muro.png') }}" alt="">
                @endif
            </div>

            <div class="publicacion-descripcion">
                {{-- IMPRIMIMOS LOS DATOS DEL USUARIO
                AUTENTICADO O DEL CUAL ESTAMOS VISITANDO --}}
                <div class="mi-flex gap-2">
                    <p class="text-white"> {{ $user->username }}</p>
                    {{-- SI PERFIL AUTENTICADO ES IGUAL AL AUTENTICADO ENTONCES EDITAMOS --}}
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}" class=""><i class='bx bx-edit-alt bx-tada'></i></a>
                        @endif
                    @endauth
                </div>

                <p class="text-white">
                    <span> {{ $user->followers->count() }}</span>
                    <a class="text-white"  href="{{ route('users.seguidores', ['user' => $user]) }}">
                        @choice('Seguidor|Seguidores', $user->followers->count())
                    </a>
                </p>

                <p class="text-white" >
                    <span> {{ $user->followings->count() }}</span>
                    <a class="text-white" href="{{ route('users.siguiendo', ['user' => $user]) }}">Siguiendo</a>
                </p>

                <p class="text-white"><span>{{ $user->posts->count() }}</span> Posts</p>

                @auth
                    {{-- SI EL USER ES DISTINTO AL USER DEL LA SESSION ENTONCES PUEDO SEGUIR 
                Y DEJAR DE SEGUIR --}}
                    @if ($user->id !== auth()->user()->id)
                        {{-- EL USUARIO QUE VISITAMOS NO CONTIENE AL USUARIO LOGIA
                            ENTONCES SIGUELE --}}
                        @if (!$user->siguiendo(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                {{-- TOKEN DE SEGURIDAD --}}
                                @csrf
                                <input type="submit" class="btn btn-primary mt-2" value="Seguir">
                            </form>
                        @else
                            {{-- EL USUARIO TENDRA QUE LOGIARSE PARA VER EL BOTON DE SEGUIR --}}
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                {{-- TOKEN DE SEGURIDAD --}}
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger mt-2" value="Dejar de Seguir">
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </section>



    <section class="mi-publicacion mt-5">
        <div class="mi-contenedor">
            <div class="d-flex justify-content-between">
                <h3 class="my-titulo-publicacion">Publicaciones</h3>
                {{-- PAGINACION --}}
                <div class="">{{ $posts->links() }}</div>
            </div>

            <div class="mi-contenido-publicacion">
                <div class="grid-cuatro">

                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <div class="mi-imagen-publicacion text-center">
                                <a href="{{ route('posts.show', ['user' => $user, 'post' => $post]) }}" class="center">
                                    <img src="{{ asset('uploads') . '/' . $post->imagen }}"
                                        alt="Imagen del post {{ $post->titulo }}">
                                </a>
                                <div class="center py-1 mi-descripcion-publicacion">
                                    <div>
                                        <p>{{ $post->created_at->diffForHumans() }}</p>
                                        <p class="titulo">{{ $post->titulo }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Aún no tienes Publicaciones.</p>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
