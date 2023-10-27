<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="card mt-2">
        <div class="card-body">
            <form class="">
                <input wire:model="search" class="form-control" type="search" name="search" placeholder="Buscar mis productos"
                    autocomplete="off">
            </form>
        </div>
    </div>

    <div class="">
        @if ($search)
            <ul class="list-group z-index mt-1">
                {{-- PINTANDO LOS DATOS CON METODO "getResultsProperty" --}}
                @forelse ($this->results as $result)
                    <a href="{{ route('posts.show', ['user' => $result->user, 'post' => $result]) }}">
                        <li class="list-group-item">
                            <img class="imagen-home" src="{{ asset('uploads/' . $result->imagen) }}"
                                alt="Imagen del post {{ $result->titulo }}" style="width: 45px;height: 45px;">
                            {{ $result->titulo }}
                        </li>
                    </a>
                @empty
                    <li class="list-group-item">No hubo resultados</li>
                @endforelse
            </ul>
        @endif
    </div>
</div>
