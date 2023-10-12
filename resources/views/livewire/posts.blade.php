<div>
    {{-- Stop trying to control. --}}
    @foreach ($posts as $post)
        <div class="contenido-publicacion">
            <div class="descripcion-imagen">
                <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}" class="center">
                    <img class="img-publicacion" src="{{ asset('uploads') . '/' . $post->imagen }}"
                        alt="Imagen del post {{ $post->titulo }}">
                </a>
                <div class="flex-between py-3">
                    <div class="">
                        {{-- SOLO LOS QUE ESTEN AUNTENTICADOS PODRAN DAR LIKE --}}
                        @auth
                            {{-- LIVEWIRE PARA LOS LIKES :"SIEMPRE VA EL NOMBRE DEL COMPONENTE" --}}
                            <livewire:like-post :post="$post" :key="$post->id" />
                        @endauth
                    </div>

                    <div>
                        <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}" class="center">
                            <i class='bx bx-message-rounded-dots bx-tada'>{{ $post->comentarios->count() }}</i>
                        </a>
                    </div>

                    <p>{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="descripcion-publicacion">
                <div class="flex">
                    <span class=""><i class='bx bx-building-house'></i></span>
                    <p class="">{{ $post->user->name }}</p>
                </div>

                <div class="flex">
                    <span class=""><i class='bx bxl-whatsapp' style='color:#23e259'></i></span>
                    <a target="_blank"
                        href="https://wa.me/51{{ $post->user->celular }}?text=Quisiera más información del producto - Nombre:{{ $post->titulo }} - {{ $post->descripcion }}"
                        class="boton texto-boton-general ">{{ $post->user->celular }}</a>
                </div>

                <div class="flex">
                    <span class=""><i class='bx bx-user'></i></span>
                    <a href=" {{ route('posts.index', $post->user) }}">
                        {{ $post->user->username }}</a>
                </div>

                <div class="flex">
                    <span class=""><i class='bx bxl-product-hunt' undefined></i></span>
                    <p> {{ $post->titulo }}</p>
                </div>

                <div class="flex">
                    <span class="">S/</span>
                    <p> {{ $post->precio }}</p>
                </div>

                <div class="">
                    <span class="" style="color: rgba(0, 0, 0, 0.767)">Descripción: </span>
                    <p>{{ $post->descripcion }}</p>
                </div>
            </div>
        </div>
    @endforeach

    <div wire:loading wire:target="loadMore">Cargando...</div>
    <script>
        window.addEventListener('scroll', function () {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                @this.call('loadMore');
            }
        });
    </script>

</div>
