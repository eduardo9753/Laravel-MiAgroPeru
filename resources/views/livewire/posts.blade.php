<div>
    {{-- Stop trying to control. --}}
    @foreach ($posts as $post)
        <div class="mb-5 p-3 fondo-publicaciones">
            <div class="text-center">
                <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}" class="center">
                    <img class="imagen-publicaciones" src="{{ asset('uploads') . '/' . $post->imagen }}"
                        alt="Imagen del post {{ $post->titulo }}">
                </a>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        {{-- SOLO LOS QUE ESTEN AUNTENTICADOS PODRAN DAR LIKE --}}
                        @auth
                            {{-- LIVEWIRE PARA LOS LIKES :"SIEMPRE VA EL NOMBRE DEL COMPONENTE" --}}
                            <livewire:like-post :post="$post" :key="$post->id" />
                        @endauth
                    </div>

                    <div>
                        <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}" class="center">
                            <i style="font-size: 20px"
                                class='bx bx-message-rounded-dots bx-tada'>{{ $post->comentarios->count() }}</i>
                        </a>
                    </div>

                    <p>{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="mt-3">
                <div class="d-flex">
                    <span class=""><i class='bx bx-building-house' style="font-size: 25px;"></i></span>
                    <a href=" {{ route('posts.index', $post->user) }}">
                        {{ $post->user->name }}</a>
                </div>

                <div class="d-flex">
                    <span class=""><i class='bx bxl-whatsapp bx-tada'
                            style='color:#23e259; font-size: 25px'></i></span>
                    <a target="_blank"
                        href="https://wa.me/51{{ $post->user->celular }}?text=Quisiera más información del producto - Nombre:{{ $post->titulo }} - {{ $post->descripcion }}"
                        class="boton texto-boton-general ">{{ $post->user->celular }}</a>
                </div>

                <div class="d-flex">
                    <span class=""><i class='bx bx-user' style="font-size: 25px;"></i></span>
                    <a href=" {{ route('posts.index', $post->user) }}">
                        {{ $post->user->username }}</a>
                </div>

                <div class="d-flex">
                    <span class=""><i class='bx bxl-product-hunt' style="font-size: 25px;" undefined></i></span>
                    <p> {{ $post->titulo }}</p>
                </div>

                <div class="d-flex align-items-center">
                    <span style="font-size: 25px;">S/</span>
                    <p style="font-size: 25px;"> {{ $post->precio }}</p>
                </div>

                <div class="">
                    <span class="" style="color: rgba(0, 0, 0, 0.767)">Descripción: </span>
                    <p>{{ $post->descripcion }}</p>
                </div>
            </div>
        </div>
    @endforeach



    @if ($posts->count() < $this->perPage)
        <div class="card">
            <div class="card-body">
                <p>Fin de las publicaciones. Sigue a más usuarios para mantenerte al día con sus productos y novedades.
                </p>
            </div>
        </div>
    @else
        <div wire:loading wire:target="loadMore" class="d-block">Cargando...</div>
    @endif

    <script>
        document.addEventListener('livewire:load', function() {
            window.addEventListener('scroll', function() {
                if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                    @this.call('loadMore');
                }
            });
        });
    </script>

</div>
