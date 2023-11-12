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
                    <div class="d-flex align-items-center gap-1">
                        @auth
                            {{-- LIVEWIRE PARA LOS LIKES :"SIEMPRE VA EL NOMBRE DEL COMPONENTE" --}}
                            <livewire:like-post :post="$ultimoPost" />
                        @endauth

                        @guest
                            <button class="btn btn-outline-danger btn-sm"><i class='bx bxs-heart'
                                    style='color:#ef0d0d'></i></button>
                            <p>{{ $ultimoPost->likes->count() }} Likes</p>
                        @endguest
                    </div>
                    {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                    {{-- SETEAMOS LA FECHA CON CARBON --}}
                    {{-- <p> {{ \Carbon\Carbon::parse($ultimoPost->fechaRegistroPost)->diffForHumans() }}</p> --}}
                    <p>{{ $ultimoPost->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="descripcion-publicacion">
                <div class="d-flex">
                    <span class=""><i class='bx bx-user'></i></span>
                    <a href=" {{ route('posts.index', $ultimoPost->user) }}">
                        {{ $ultimoPost->user->username }}</a>
                </div>

                <div class="d-flex">
                    <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'></i></span>
                    <a target="_blank"
                        href="https://wa.me/51{{ $ultimoPost->user->celular }}?text=Quisiera más información del producto - Nombre:{{ $ultimoPost->titulo }} - {{ $ultimoPost->descripcion }}"
                        class="boton texto-boton-general ">{{ $ultimoPost->user->celular }}</a>
                </div>

                <div class="d-flex">
                    <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                    <p>{{ $ultimoPost->titulo }}</p>
                </div>

                <div class="d-flex">
                    <span class="">S/</span>
                    <p>{{ $ultimoPost->precio }}</p>
                </div>

                <div class="d-flex">
                    <span class="" style="color: rgba(0, 0, 0, 0.767)">Descripción: </span>
                    <p>{{ $ultimoPost->descripcion }}</p>
                </div>


                <div class="d-flex">
                    <span class=""></span>
                    {{-- PARA CONSULTAS DIRECTAS DE TIPO "SELECT" --}}
                    {{-- SETEAMOS LA FECHA CON CARBON --}}
                    {{-- <p> {{ \Carbon\Carbon::parse($ultimoPost->fechaRegistroPost)->diffForHumans() }}</p> --}}
                </div>

                <div>
                    @guest
                        <div class="text-center my-4">
                            <a class="btn btn-success w-100" href="{{ route('register') }}" class="">Registrate y dale Like</a>
                        </div>
                    @endguest
                </div>
            </div>
            {{-- @endforeach --}}
        @else
            <ul class="center gap-3">
                <li class=""><a href="{{ route('register') }}" class="link text-center">Registrate y publica tus productos</a></li>
            </ul>
        @endif
    </div>
</div>
