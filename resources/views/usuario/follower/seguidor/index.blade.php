<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Mis Seguidores
@endsection

@php use App\Models\User; @endphp


@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->


    <section class="my-5" id="">
        <div class="container">

            @if ($seguidores->count())
                <div>
                    <h3 class="text-center my-5">Seguidores de <strong>{{ $user->username }}</strong></h3>
                </div>

                <div class="row">
                    <!--primer bucle para recorrer los ids de nuestro seguidores-->
                    @foreach ($seguidores as $seguidor)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    @php
                                        $users = User::where('id', '=', $seguidor->follower_id)->get();
                                    @endphp
                                    <!--segundo blucle pintando los datos de nuestro seguidores-->
                                    @foreach ($users as $user)
                                        <div class="">
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

                                        <div class="">
                                            <a href=" {{ route('posts.index', $user) }}">
                                                {{ $user->username }}</a>
                                            <p>Se unio: <span
                                                    class="incio-usuario">{{ $user->created_at->diffForHumans() }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 center">{{ $seguidores->withQueryString()->links() }}</div>
            @else
                <p class="">Sin seguidores por ahora.</p>
            @endif
        </div>
    </section>
@endsection




@section('footer')
   <!-- footer -->
   @include('helpers.footer')
   <!--  footer -->
@endsection
