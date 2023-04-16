<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    {{ $user->username }}
@endsection


@section('contenido')
    <section class="publicacion-usuario" id="">
        <div class="mi-contenedor center espacio-entre relleno">
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
                    <p> {{ $user->username }}</p>
                    {{-- SI PERFIL AUTENTICADO ES IGUAL AL AUTENTICADO ENTONCES EDITAMOS --}}
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}" class=""><i class='bx bx-edit-alt bx-tada'></i></a>
                        @endif
                    @endauth
                </div>
                <p><span> {{ $user->followers->count() }}</span> @choice('Seguidor|Seguidores',$user->followers->count())</p>
                <p><span> {{ $user->followings->count() }}</span> Siguiendo</p>
                <p><span>{{ $user->posts->count() }}</span> Posts</p>

                {{-- EL USUARIO TENDRA QUE LOGIARSE PARA VER EL BOTON DE SEGUIR --}}
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
                                <input type="submit" class="crear-boton azul text-white my-2" value="Seguir">
                            </form>
                        @else
                            {{-- EL USUARIO TENDRA QUE LOGIARSE PARA VER EL BOTON DE SEGUIR --}}
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                {{-- TOKEN DE SEGURIDAD --}}
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="crear-boton rojo text-white my-2" value="Dejar de Seguir">
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </section>



    <section class="mi-publicacion">
        <div class="mi-contenedor">
            <div>
                <h3 class="my-titulo-publicacion">Mis Productos</h3>
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

                        {{-- PAGINACION --}}
                        <div>
                            {{ $posts->links() }}
                        </div>
                    @else
                        <p>Aún no tienes Publicaciones.</p>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
