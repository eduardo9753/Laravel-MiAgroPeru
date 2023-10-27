<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Mis Seguidores
@endsection

@php use App\Models\User; @endphp


@section('contenido')
    <section class="publicacion" id="busacdor">
        <div class="mi-contenedor">

            @if ($seguidores->count())
                <div>
                    <h3 class="titulo-publicacion espacio-arriba-titulos">Seguidores de {{ $user->username }}</h3>
                </div>
                <div class="grid-follower">
                    <!--primer bucle para recorrer los ids de nuestro seguidores-->
                    @foreach ($seguidores as $seguidor)
                        @php
                            $users = User::where('id', '=', $seguidor->follower_id)->get();
                        @endphp
                        <!--segundo blucle pintando los datos de nuestro seguidores-->
                        @foreach ($users as $user)
                            <div class="contenido-publicacion ">
                                <div class="descripcion-imagen">
                                    <div class="text-center mb-3">
                                        @if ($user->imagen)
                                            <a href=" {{ route('posts.index', $user) }}"><img style="width: 45px;height: 45px;"
                                                    class="img-caja-usuario-publicacion"
                                                    src="{{ asset('perfiles/' . $user->imagen) }}" alt=""></a>
                                        @else
                                            <a href="{{ route('posts.index', $user) }}"><img style="width: 45px;height: 45px;"
                                                    class="img-caja-usuario-publicacion"
                                                    src="{{ asset('img/usuario/usuario-muro.png') }}" alt=""></a>
                                        @endif
                                    </div>
                                </div>

                                <div class="descripcion-publicacion">
                                    <a href=" {{ route('posts.index', $user) }}">
                                        {{ $user->username }}</a>
                                    <p>Se unio: <span class="incio-usuario">{{ $user->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="mt-5 center">{{ $seguidores->withQueryString()->links() }}</div>
            @else
                <p class="espacio-arriba-titulos">Sin seguidores por ahora.</p>
            @endif
        </div>
    </section>
@endsection
