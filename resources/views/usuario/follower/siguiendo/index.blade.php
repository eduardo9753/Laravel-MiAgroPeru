<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Siguiendo a
@endsection




@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->


    <section class="" id="">
        <div class="container">

            @if ($siguiendo->count())
                <div>
                    <h3 class="text-center my-5"><strong>{{ $user->username }}</strong> sigue a</h3>
                </div>
                <div class="row">
                    @foreach ($siguiendo as $user)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="contenido-publicacion ">
                                        <div class="descripcion-imagen">
                                            <div class="text-center mb-3">
                                                @if ($user->imagen)
                                                    <a href=" {{ route('posts.index', $user) }}"><img
                                                            style="width: 45px;height: 45px;"
                                                            class="img-caja-usuario-publicacion"
                                                            src="{{ asset('perfiles/' . $user->imagen) }}"
                                                            alt=""></a>
                                                @else
                                                    <a href="{{ route('posts.index', $user) }}"><img
                                                            style="width: 45px;height: 45px;"
                                                            class="img-caja-usuario-publicacion"
                                                            src="{{ asset('img/usuario/usuario-muro.png') }}"
                                                            alt=""></a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="descripcion-publicacion">
                                            <a href=" {{ route('posts.index', $user) }}">
                                                {{ $user->username }}</a>
                                            <p>Se unio: <span
                                                    class="incio-usuario">{{ $user->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 center">{{ $siguiendo->withQueryString()->links() }}</div>
            @else
                <p class="espacio-arriba-titulos">No sigue a nadie por ahora.</p>
            @endif
        </div>
    </section>
@endsection



@section('footer')
     <!-- footer -->
     @include('helpers.footer')
     <!--  footer -->
@endsection
