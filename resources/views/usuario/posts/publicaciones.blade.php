<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    Publicaciones de mi Seguidores
@endsection


@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->


    <section class="container">
        <div class="pt-5">.</div>

        <div class="row">
            {{-- CAJA USUARIO --}}
            <div class="col-md-3">
                <div class="card fondo-publicaciones">
                    <div class="card-body">
                        <div class="caja-usuario-publicacion item-center gap-3">
                            <div id="publicacion-perfil" class=" text-center">
                                @if (auth()->user()->imagen)
                                    <a href=" {{ route('posts.index', auth()->user()) }}">
                                        <img class="imagen-usuario" src="{{ asset('perfiles/' . auth()->user()->imagen) }}"
                                            alt="">
                                    </a>
                                @else
                                    <a href="{{ route('posts.index', auth()->user()) }}">
                                        <img class="imagen-usuario" src="{{ asset('img/usuario/usuario-muro.png') }}"
                                            alt="">
                                    </a>
                                @endif
                            </div>

                            <div>
                                <a href=" {{ route('posts.index', auth()->user()) }}">
                                    <p class="text-black text-center"> {{ auth()->user()->username }}</p>
                                </a>

                                <p>
                                    <a href="{{ route('users.seguidores', ['user' => auth()->user()]) }}">
                                        <span> {{ auth()->user()->followers->count() }}</span>
                                        @choice(
                                            'Seguidor|Seguidores',
                                            auth()->user()->followers->count()
                                        )
                                    </a>
                                </p>

                                <p>
                                    <a href="{{ route('users.siguiendo', ['user' => auth()->user()]) }}"><span>
                                            {{ auth()->user()->followings->count() }}</span> Siguiendo</a>
                                </p>

                                <p><a href="{{ route('posts.index', auth()->user()) }}"><span>{{ auth()->user()->posts->count() }}</span>
                                        Posts</a></p>

                                <p>Te uniste:
                                    <span class="incio-usuario">{{ auth()->user()->created_at->diffForHumans() }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- RECORRIDO DE DATOS DE LAS PUBLICACIONES DE MIS SEGUIDORES --}}
            {{-- Y AGREGANDO EL COMPONENTE "listar-post" --}}
            <div class="col-md-6">
                {{-- LIVEWIRE DINAMICO POR PAGINA --}}
                <livewire:posts />
            </div>



            {{-- ASIDE "PARA MOSTRAR USUARIOS QUE PUEDA SEGUIR O VER" --}}
            <div class="col-md-3">
                @foreach ($users as $user)
                    <div class="card fondo-publicaciones">
                        <div class="card-body">
                            <div class="">
                                <div class="text-center">
                                    <div>
                                        @if ($user->imagen)
                                            <a href=" {{ route('posts.index', $user) }}">
                                                <img class="imagen-usuario" src="{{ asset('perfiles/' . $user->imagen) }}"
                                                    alt="">
                                            </a>
                                        @else
                                            <a href="{{ route('posts.index', $user) }}">
                                                <img class="imagen-usuario"
                                                    src="{{ asset('img/usuario/usuario-muro.png') }}" alt="">
                                            </a>
                                        @endif
                                    </div>

                                    <div class="">
                                        <a href=" {{ route('posts.index', $user) }}">
                                            {{ $user->username }}
                                        </a>
                                        <p>Se unio: <span
                                                class="incio-usuario">{{ $user->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
