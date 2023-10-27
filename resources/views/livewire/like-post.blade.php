<div>
    <div class="mi-flex gap-1">
        {{-- TRAEMOS SOLO EL BOTON SIN EL FORMULARIO Y BORRAMOS "type="submit"" --}}
        <button class="btn btn-outline-danger btn-sm" wire:click="like" {{-- ESTE NOMBRE SEBE SER IGUAL A METODO DE LikePost.php --}}>
            @if ($isLiked)
                <i class='bx bxs-heart bx-flashing'></i>
            @else
                <i class='bx bx-heart bx-tada'></i>
            @endif
        </button>

        <p> {{ $likes }} Likes</p>
    </div>

</div>
