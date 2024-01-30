<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    {{ $user->username }}
@endsection



@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->


    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="mt-3 imagen-show" src="{{ asset('uploads') . '/' . $post->imagen }}"
                                            alt="Imagen del post {{ $post->titulo }}">
                                    </div>

                                    <div class="my-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                @auth
                                                    {{-- LIVEWIRE PARA LOS LIKES :"SIEMPRE VA EL NOMBRE DEL COMPONENTE" --}}
                                                    <livewire:like-post :post="$post" />
                                                @endauth


                                                @guest
                                                    <div class="d-flex align-content-center">
                                                        <button class="btn btn-outline-danger btn-sm"><i class='bx bxs-heart'
                                                                style='color:#ef0d0d'></i></button>
                                                        <p class="pl-2">{{ $post->likes->count() }} Likes</p>
                                                    </div>
                                                @endguest
                                            </div>
                                            <p class="tiempo-comentario">{{ $post->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>

                                    <div class="my-5">
                                        <div class="d-flex">
                                            <span class=""><i class='bx bx-building-house'
                                                    style="font-size: 25px;"></i></span>
                                            <a href=" {{ route('posts.index', $post->user->username) }}">
                                                {{ $post->user->name }}</a>
                                        </div>

                                        <div class="d-flex">
                                            <span class=""><i class='bx bxl-whatsapp bx-tada'
                                                    style='color:#23e259; font-size: 25px;'></i></span>
                                            <a target="_blank"
                                                href="https://wa.me/51{{ $post->user->celular }}?text=Quisiera más información del producto - Nombre:{{ $post->titulo }} - {{ $post->descripcion }}"
                                                class="boton texto-boton-general ">{{ $post->user->celular }}</a>

                                        </div>

                                        <div class="d-flex">
                                            <span class=""><i class='bx bx-user' style="font-size: 25px;"></i></span>
                                            <a href=" {{ route('posts.index', $post->user->username) }}">
                                                {{ $post->user->username }}</a>
                                        </div>

                                        <div class="d-flex">
                                            <span class=""><i class='bx bxl-product-hunt' style="font-size: 25px;"
                                                    undefined></i></span>
                                            <p class="">{{ $post->titulo }}</p>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <span style="font-size: 25px;">S/</span>
                                            <p style="font-size: 25px;">{{ $post->precio }}</p>
                                        </div>

                                        <div class="">
                                            <span class="" style="color: rgba(0, 0, 0, 0.767)">Descripción: </span>
                                            <p class="comentarios-tamanio">{{ $post->descripcion }}</p>
                                        </div>

                                        @auth
                                            {{-- SI EL ID DEL POST PUBLICADO ES IGUAL AL ID DE USUARIO QUE SE LOGEA
                                            ENTONCES ES SUYO Y PODEMOS ELIMINAR SU PUBLICACION --}}
                                            @if ($post->user_id === auth()->user()->id)
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @method('DELETE') {{-- METODO SPOOFING --}}
                                                    @csrf
                                                    <input type="submit" value="Eliminar Publicacion"
                                                        class="mt-4 btn btn-danger">
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    @auth
                                        <form id="form-comentario"
                                            action="{{ route('comentarios.store', ['username' => $user->username, 'id' => $post->id]) }}"
                                            method="POST">
                                            {{-- TOQUEN DE SEGURIDAD --}}
                                            @csrf

                                            <div class="form-group">
                                                <label for="comentario" class="label-registro">Añade un Comentario</label>
                                                <textarea name="comentario" id="comentario" class="form-control border-input" cols="30" rows="5">{{ old('comentario') }}</textarea>
                                                {{-- alerta de error --}}
                                                <span class="text-danger error-text comentario_error"></span>
                                            </div>

                                            <div> <button type="submit" class="btn btn-success w-100 mt-2"
                                                    id="">Comentar</button>
                                            </div>
                                        </form>
                                    @endauth

                                    {{-- CAJA DE COMENTARIOS --}}
                                    <input type="text" hidden value="{{ $post->id }}" id="id_post">
                                    <div id="all-comemts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="{{ asset('js/ajaxComentario.js') }}"></script>
            </div>
        </div>
    </section>
@endsection



@section('footer')
    <!-- footer -->
    @include('helpers.footer')
    <!--  footer -->
@endsection
