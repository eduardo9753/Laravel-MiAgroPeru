<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    Publicaciones de mi Seguidores
@endsection


@section('contenido')
    <section class="publicacion">
        <div>
            <h3 class="titulo-publicacion">Publicaciones</h3>
        </div>

        <div class="mi-contenedor entre gap-3">
            {{-- CAJA USUARIO --}}
            <div>
                <div class="caja-usuario-publicacion entre item-center gap-3">
                    <div class="">
                        @if (auth()->user()->imagen)
                            <a href=" {{ route('posts.index', auth()->user()) }}"><img class="img-caja-usuario-publicacion"
                                    src="{{ asset('perfiles/' . auth()->user()->imagen) }}" alt=""></a>
                        @else
                            <a href="{{ route('posts.index', auth()->user()) }}"><img class="img-caja-usuario-publicacion"
                                    src="{{ asset('img/usuario/usuario-muro.png') }}" alt=""></a>
                        @endif
                    </div>

                    <div>
                        <a href=" {{ route('posts.index', auth()->user()) }}">
                            {{ auth()->user()->username }}</a>
                        <p><span> {{ auth()->user()->followers->count() }}</span> @choice(
                            'Seguidor|Seguidores',
                            auth()->user()->followers->count()
                        )</p>
                        <p><span> {{ auth()->user()->followings->count() }}</span> Siguiendo</p>
                        <p><span>{{ auth()->user()->posts->count() }}</span> Posts</p>
                        <p>Te uniste: <span class="incio-usuario">{{ auth()->user()->created_at->diffForHumans() }}</span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- RECORRIDO DE DATOS DE LAS PUBLICACIONES DE MIS SEGUIDORES --}}
            {{-- Y AGREGANDO EL COMPONENTE "listar-post" --}}
            <div>
                <x-listar-post :posts="$posts" /> {{-- AQUI LE PASAMOS LA VARIABLE QUE VIENE DEL CONTROLADOR "posts.publicacion" --}}
            </div>



            {{-- ASIDE "PARA MOSTRAR USURIOS QUE PUEDA SEGUIR O VER" --}}
            <div>
                @foreach ($users as $user)
                    <div class="caja-usuario-publicacion entre item-center gap-3 mb-2">
                        <div class="text-center">
                            <div>
                                @if ($user->imagen)
                                    <a href=" {{ route('posts.index', $user) }}"><img
                                            class="img-caja-usuario-publicacion"
                                            src="{{ asset('perfiles/' . $user->imagen) }}" alt=""></a>
                                @else
                                    <a href="{{ route('posts.index', $user) }}"><img
                                            class="img-caja-usuario-publicacion"
                                            src="{{ asset('img/usuario/usuario-muro.png') }}" alt=""></a>
                                @endif
                            </div>

                            <div class="">
                                <a href=" {{ route('posts.index', $user) }}">
                                    {{ $user->username }}</a>
                                <p>Se unio: <span
                                        class="incio-usuario">{{ $user->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
