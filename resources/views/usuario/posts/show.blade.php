<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    {{ $user->username }}
@endsection



@section('contenido')
    <section class="ver-publicacion relleno">
        <div class="mi-contenedor">
            <div class="entre espacio-entre">
                <div>
                    <div class="text-center">
                        <img class="mt-3 img-publicacion" src="{{ asset('uploads') . '/' . $post->imagen }}"
                            alt="Imagen del post {{ $post->titulo }}">
                    </div>

                    <div class="my-3">
                        <div class="flex-around">
                            <div class="d-flex align-items-center gap-1">
                                @auth
                                    {{-- LIVEWIRE PARA LOS LIKES :"SIEMPRE VA EL NOMBRE DEL COMPONENTE" --}}
                                    <livewire:like-post :post="$post" />
                                @endauth

                                @guest
                                    <button class="btn btn-outline-danger btn-sm"><i class='bx bxs-heart'
                                            style='color:#ef0d0d'></i></button>
                                    <p>{{ $post->likes->count() }} Likes</p>
                                @endguest
                            </div>
                            <p class="tiempo-comentario">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="">
                        <div class="d-flex">
                            <span class=""><i class='bx bx-building-house'></i></span>
                            <p class="">{{ $post->user->name }}</p>
                        </div>

                        <div class="d-flex">
                            <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'></i></span>
                            <a target="_blank"
                                href="https://wa.me/51{{ $post->user->celular }}?text=Quisiera más información del producto - Nombre:{{ $post->titulo }} - {{ $post->descripcion }}"
                                class="boton texto-boton-general ">{{ $post->user->celular }}</a>

                        </div>

                        <div class="d-flex">
                            <span class=""><i class='bx bx-user'></i></span>
                            <a href=" {{ route('posts.index', $post->user->username) }}">
                                {{ $post->user->username }}</a>
                        </div>

                        <div class="d-flex">
                            <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                            <p class="">{{ $post->titulo }}</p>
                        </div>

                        <div class="d-flex">
                            <span class="">S/</span>
                            <p>{{ $post->precio }}</p>
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
                                    <input type="submit" value="Eliminar Publicacion" class="mt-4 btn btn-danger">
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>


                <div>
                    @auth
                        <form id="form-comentario"
                            action="{{ route('comentarios.store', ['username' => $user->username, 'id' => $post->id]) }}"
                            method="POST">
                            {{-- TOQUEN DE SEGURIDAD --}}
                            @csrf

                            <div class="form-group">
                                <label for="comentario" class="label-registro">Añade un Comentario</label>
                                <textarea name="comentario" id="comentario" class="form-control" cols="30" rows="5">{{ old('comentario') }}</textarea>
                                {{-- alerta de error --}}
                                <span class="text-danger error-text comentario_error"></span>
                            </div>

                            <div> <button type="submit" class="btn btn-success w-100 mt-2" id="">Comentar...</button>
                            </div>
                        </form>
                    @endauth

                    {{-- CAJA DE COMENTARIOS --}}
                    <input type="text" hidden value="{{ $post->id }}" id="id_post">
                    <div id="all-comemts"></div>
                </div>

            </div>
        </div>
    </section>
@endsection
