<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Siguiendo a
@endsection




@section('contenido')
    <section class="publicacion" id="busacdor">
        <div class="mi-contenedor">

            @if ($siguiendo->count())
                <div>
                    <h3 class="titulo-publicacion espacio-arriba-titulos">{{ $user->username }} sigue a</h3>
                </div>
                <div class="grid-seis">
                    @foreach ($siguiendo as $user)
                        <div class="contenido-publicacion ">
                            <div class="descripcion-imagen">
                                <div>
                                    @if ($user->imagen)
                                        <a href=" {{ route('posts.index', $user) }}"><img class="img-caja-usuario-publicacion"
                                                src="{{ asset('perfiles/' . $user->imagen) }}" alt=""></a>
                                    @else
                                        <a href="{{ route('posts.index', $user) }}"><img
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
                </div>
                {{ $siguiendo->withQueryString()->links() }}
            @else
                <p class="espacio-arriba-titulos">No sigue a nadie por ahora.</p>
            @endif
        </div>
    </section>
@endsection
