<div class="center">
    <div class="contenido-publicacion tamanio-publicacion">
        @if ($ultimoPost)
            <div>
                <h3 class="titulo-publicacion">Ultima Publicación </h3>
            </div>
            {{-- @foreach ($ultimoPost as $ultimoPost) --}}
            <div class="descripcion-imagen">
                <a href="{{ route('posts.show', ['user' => $ultimoPost->user, 'post' => $ultimoPost]) }}" class="center">
                    <img class="imagen-home" src="{{ asset('uploads/' . $ultimoPost->imagen) }}"
                        alt="Imagen del post {{ $ultimoPost->titulo }}">
                </a>
                <div class="flex-between py-3">
                    <div class="flex">
                        <span class=""><i class='bx bxs-heart' style='color:#ef0d0d'></i></span>
                        <p>{{ $ultimoPost->likes->count() }}</p> 
                    </div>
                    {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                    {{-- SETEAMOS LA FECHA CON CARBON --}}
                    {{-- <p> {{ \Carbon\Carbon::parse($ultimoPost->fechaRegistroPost)->diffForHumans() }}</p> --}}
                    <p>{{ $ultimoPost->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="descripcion-publicacion">
                <div class="flex">
                    <span class=""><i class='bx bx-user'></i></span>
                    <a href=" {{ route('posts.index', $ultimoPost->user) }}">
                        {{ $ultimoPost->user->username }}</a>
                </div>

                <div class="flex">
                    <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'></i></span>
                    <a target="_blank"
                        href="https://wa.me/51{{ $ultimoPost->user->celular }}?text=Quisiera más información del producto - Nombre:{{ $ultimoPost->titulo }} - {{ $ultimoPost->descripcion }}"
                        class="boton texto-boton-general ">{{ $ultimoPost->user->celular }}</a>
                </div>

                <div class="flex">
                    <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                    <p>{{ $ultimoPost->titulo }}</p>
                </div>

                <div class="flex">
                    <span class="">S/</span>
                    <p>{{ $ultimoPost->precio }}</p>
                </div>

                <div class="">
                    <span class="" style="color: rgba(0, 0, 0, 0.767)">Descripción: </span>
                    <p class="text-xl">{{ $ultimoPost->descripcion }}</p>
                </div>

                <div class="flex">
                    <span class=""></span>
                    {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                    {{-- SETEAMOS LA FECHA CON CARBON --}}
                    {{-- <p> {{ \Carbon\Carbon::parse($ultimoPost->fechaRegistroPost)->diffForHumans() }}</p> --}}
                </div>

                <div>
                    @guest
                        <p class="text-center mt-5">Para darle Like - Registrate en el Portal</p>
                        <div class="text-center my-4">
                            <a href="{{ route('register') }}" class="">Quiero Registrarme</a>
                        </div>
                    @endguest
                </div>
            </div>
            {{-- @endforeach --}}
        @else
            <h2 class="text-center">Registrate y publica</h2>
            <ul class="center gap-3">
                <li class="link-menu"><a href="{{ route('register') }}" class="link text-center">Registrarme</a></li>
            </ul>
        @endif
    </div>
</div>
