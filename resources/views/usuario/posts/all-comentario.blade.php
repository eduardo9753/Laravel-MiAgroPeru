<div class="comentarios-altura">
    {{-- ACCEDIENDO A LA RELACION"comentarios" QUE SE ACREADO EN EL MODELO Post Y 
    CONTAMOS LOS COMENTARIOS INGRESADOS --}}
    @if ($post)
        @foreach ($post as $post)
            <div class="my-2">
                <div class="">
                    {{-- IMPRIMIENDO EL USUARIO CON LA RELACION EN EL MODELO "Comentario" --}}
                    <div class="d-flex justify-content-between">
                        @if ($post->imagen)
                            <a href=" {{ route('posts.index', $post->username) }}">
                                <img class="imagen-comentario" src="{{ asset('perfiles') . '/' . $post->imagen }}"
                                    alt="Imagen del post {{ $post->imagen }}">
                            </a>
                        @else
                            <a href=" {{ route('posts.index', $post->username) }}">
                                <img class="imagen-comentario" src="{{ asset('img/usuario/usuario-muro.png') }}"
                                    alt="">
                            </a>
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

                    <p class="descripcion-comentario "> {{ $post->comentario }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p class="my-4 p-3 text-center">Sin comentarios aún</p>
    @endif
</div>
