<div class="comentarios-altura">
    {{-- ACCEDIENDO A LA RELACION"comentarios" QUE SE ACREADO EN EL MODELO Post Y 
    CONTAMOS LOS COMENTARIOS INGRESADOS 
    @if ($post->comentarios->count())
        @foreach ($post->comentarios as $comentario)
            <div class=" my-2 comentarios-tamanio gap-2 comentarios-borde">
                <div class="">
                    {{-- IMPRIMIENDO EL USUARIO CON LA RELACION EN EL MODELO "Comentario"
                    <div class="flex-between">
                        <div class="mi-flex gap-1">
                            @if ($comentario->user->imagen)
                                <img class="imagen-comentario"
                                    src="{{ asset('perfiles') . '/' . $comentario->user->imagen }}"
                                    alt="Imagen del post {{ $user->imagen }}">
                            @else
                                <img class="imagen-comentario" src="{{ asset('img/usuario/usuario-muro.png') }}"
                                    alt="">
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
    @endif --}}


    {{-- ACCEDIENDO A LA RELACION"comentarios" QUE SE ACREADO EN EL MODELO Post Y 
    CONTAMOS LOS COMENTARIOS INGRESADOS --}}
    @if ($post)
        @foreach ($post as $post)
            <div class=" my-2 comentarios-tamanio gap-2 comentarios-borde">
                <div class="">
                    {{-- IMPRIMIENDO EL USUARIO CON LA RELACION EN EL MODELO "Comentario" --}}
                    <div class="flex-between">
                        <div class="mi-flex gap-1">
                            @if ($post->imagen)
                                <img class="imagen-comentario" src="{{ asset('perfiles') . '/' . $post->imagen }}"
                                    alt="Imagen del post {{ $post->imagen }}">
                            @else
                                <img class="imagen-comentario" src="{{ asset('img/usuario/usuario-muro.png') }}"
                                    alt="">
                            @endif

                            {{-- COMO ES UN SELECT SE PASA EL VALOR Y YA NO EL OBJETO
                                TAMBIEN EDITAR LA RUTA EN 'web.php' --}}
                            <a href=" {{ route('posts.index', $post->username) }}">
                                {{ $post->username }}</a>
                        </div>
                        {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                        {{-- SETEAMOS LA FECHA CON CARBON --}}
                        {{-- <p> {{ \Carbon\Carbon::parse($ultimoPost->fechaRegistroPost)->diffForHumans() }}</p> --}}
                        <p class="tiempo-comentario"> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                        </p>
                    </div>
                    <p class="descripcion-comentario "> {{ $post->comentario }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p class="my-4 p-3 text-center">No hay Comentarios. Añade un nuevo comentario</p>
    @endif
</div>
