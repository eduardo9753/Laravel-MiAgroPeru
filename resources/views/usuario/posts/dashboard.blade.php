<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    {{ $user->username }}
@endsection


@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->


    <section class="my-5" id="">
        <div class="container">

            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="d-flex justify-content-around align-items-center">
                        <div class="">
                            @if ($user->imagen)
                                <img class="imagen-publicaciones" src="{{ asset('perfiles/' . $user->imagen) }}" alt="">
                            @else
                                <img class="imagen-publicaciones" src="{{ asset('img/usuario/usuario-muro.png') }}" alt="">
                            @endif
                        </div>

                        <div class="">
                            {{-- IMPRIMIMOS LOS DATOS DEL USUARIO
                        AUTENTICADO O DEL CUAL ESTAMOS VISITANDO --}}
                            <div class="mi-flex">
                                <p class=""> {{ $user->username }}</p>
                                {{-- SI PERFIL AUTENTICADO ES IGUAL AL AUTENTICADO ENTONCES EDITAMOS --}}
                                @auth
                                    @if ($user->id === auth()->user()->id)
                                        <a class="btn btn-warning btn-sm " href="{{ route('perfil.index') }}" class=""><i
                                                class='bx bx-edit-alt bx-tada'></i></a>
                                    @endif
                                @endauth
                            </div>

                            <p class="">
                                <span> {{ $user->followers->count() }}</span>
                                <a class="" href="{{ route('users.seguidores', ['user' => $user]) }}">
                                    @choice('Seguidor|Seguidores', $user->followers->count())
                                </a>
                            </p>

                            <p class="">
                                <span> {{ $user->followings->count() }}</span>
                                <a class="" href="{{ route('users.siguiendo', ['user' => $user]) }}">Siguiendo</a>
                            </p>

                            <p class=""><span>{{ $user->posts->count() }}</span> Posts</p>

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
                </div>
            </div>
        </div>

    </section>


    <section class="my-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="">Publicaciones</h3>
                {{-- PAGINACION --}}
                <div class="my-3">{{ $posts->links() }}</div>
            </div>


            <div class="row text-center">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="col-md-3">
                            <a href="{{ route('posts.show', ['user' => $user, 'post' => $post]) }}" class="center">
                                <img class="imagen-publicaciones" src="{{ asset('uploads') . '/' . $post->imagen }}"
                                    alt="Imagen del post {{ $post->titulo }}">
                            </a>

                            <div class="">
                                <p>{{ $post->created_at->diffForHumans() }}</p>
                                <p class="titulo">{{ $post->titulo }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Aún no tienes Publicaciones.</p>
                @endif
            </div>
        </div>
    </section>
@endsection



@section('footer')
     <!-- footer -->
     @include('helpers.footer')
     <!--  footer -->
@endsection