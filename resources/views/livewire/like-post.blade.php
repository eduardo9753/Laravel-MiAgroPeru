<div>
    <div class="d-flex align-items-center">
        {{-- TRAEMOS SOLO EL BOTON SIN EL FORMULARIO Y BORRAMOS "type="submit"" --}}
        <button class="btn btn-outline-danger btn-sm" wire:click="like" {{-- ESTE NOMBRE SEBE SER IGUAL A METODO DE LikePost.php --}}>
            @if ($isLiked)
                <i style="font-size: 24px" class='bx bxs-heart bx-flashing'></i>
            @else
                <i style="font-size: 24px" class='bx bx-heart bx-tada'></i>
            @endif
        </button>

        <p class="pl-2"> {{ $likes }} Likes</p>
    </div>

</div>
