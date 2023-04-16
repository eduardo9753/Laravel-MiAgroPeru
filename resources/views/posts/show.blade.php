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
                    <img class="mt-3" src="{{ asset('uploads') . '/' . $post->imagen }}"
                        alt="Imagen del post {{ $post->titulo }}">

                    <div class="my-3">
                        <div class="flex-around">
                            <div class="">
                                {{-- SOLO LOS QUE ESTEN AUNTENTICADOS PODRAN DAR LIKE --}}
                                @auth
                                    {{-- LIVEWIRE PARA LOS LIKES :"SIEMPRE VA EL NOMBRE DEL COMPONENTE" --}}
                                    <livewire:like-post :post="$post" />

                                    {{-- CHEKEAMOS SI EL USUARIO AUTENTICADO LE HA DADO LIKE
                                    @if ($post->checkLike(auth()->user()))
                                        <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"><i class='bx bxs-heart bx-flashing'
                                                    style='color:#f50202'></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('posts.likes.store', $post) }}" method="POST">
                                            @csrf
                                            <button type="submit"><i class='bx bx-heart bx-tada'
                                                    style='color:#f50202'></i></button>
                                        </form>
                                    @endif --}}
                                @endauth
                            </div>
                            <p class="tiempo-comentario">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="">
                        <div class="flex">
                            <span class=""><i class='bx bx-building-house' ></i></span>
                            <p class="">{{ $post->user->name }}</p>
                        </div>
    
                        <div class="flex">
                            <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'  ></i></span>
                            <p class="">{{ $post->user->celular }}</p>
                        </div>

                        <div class="flex">
                            <span class=""><i class='bx bx-user'></i></span>
                            <a href=" {{ route('posts.index', $post->user->username) }}">
                                {{ $post->user->username }}</a>
                        </div>

                        <div class="flex">
                            <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                            <p class="">{{ $post->titulo }}</p>
                        </div>

                        <div class="flex">
                            <span class=""><i class='bx bx-dollar'></i></span>
                            <p>{{ $post->precio }}</p>
                        </div>

                        <div class="flex">
                            <span class=""><i class='bx bx-paragraph'></i></span>
                            <p class="descripcion-tamanio">{{ $post->descripcion }}</p>
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
                        {{-- IMPRIMIENDO MENSAJE DE SESSION CUANDO SE AGREGA NUEVO COMENTARIO --}}
                        @if (session('mensaje'))
                            <div class="mensaje pb-2"> {{ session('mensaje') }}</div>
                        @endif

                        <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post]) }}" method="POST">
                            {{-- TOQUEN DE SEGURIDAD --}}
                            @csrf

                            <div class="form-group">
                                <label for="comentario" class="label-registro">Añade un Comentario</label>
                                <textarea name="comentario" id="comentario" class="form-control" cols="30" rows="5">{{ old('comentario') }}</textarea>
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('comentario')
                                    <p class="error-registro-usuario">{{ $message }}</p>
                                @enderror
                            </div>

                            <div> <button type="submit" class="crear-boton color-verde w-100"
                                    id="">Comentar...</button>
                            </div>
                        </form>
                    @endauth

                    {{-- CAJA DE COMENTARIOS --}}
                    <div class="comentarios-altura">
                        {{-- ACCEDIENDO A LA RELACION"comentarios" QUE SE ACREADO EN EL MODELO Post Y 
                        CONTAMOS LOS COMENTARIOS INGRESADOS --}}
                        @if ($post->comentarios->count())
                            @foreach ($post->comentarios as $comentario)
                                <div class=" my-2 comentarios-tamanio gap-2 comentarios-borde">
                                    <div class="">
                                        {{-- IMPRIMIENDO EL USUARIO CON LA RELACION EN EL MODELO "Comentario" --}}
                                        <div class="flex-between">
                                            <div class="mi-flex gap-1">
                                                @if ($comentario->user->imagen)
                                                    <img class="imagen-comentario" 
                                                        src="{{ asset('perfiles') . '/' . $comentario->user->imagen }}"
                                                        alt="Imagen del post {{ $user->imagen }}">
                                                @else
                                                    <img class="imagen-comentario" 
                                                        src="{{ asset('img/usuario/usuario-muro.png') }}" alt="">
                                                @endif

                                                <a href=" {{ route('posts.index', $comentario->user) }}">
                                                    {{ $comentario->user->username }}</a>
                                            </div>
                                            <p class="tiempo-comentario"> {{ $comentario->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <p class="descripcion-comentario "> {{ $comentario->comentario }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="my-4 p-3 text-center">No hay Comentarios. Añade un nuevo comentario</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
