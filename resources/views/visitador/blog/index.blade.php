<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Noticas
@endsection




@section('contenido')
    <section class="publicacion" id="busacdor">
        <div class="mi-contenedor">
            <div class="">
                <h3 class="titulo-publicacion espacio-arriba-titulos">Noticias - Miagroperu</h3>
            </div>

            <div class="grid-dos gap-4">
                <div class="contenido-publicacion ">
                    <div class="descripcion-imagen">
                        <iframe src="https://www.youtube.com/embed/hnhBMPYlvEo" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>

                    <div class="descripcion-publicacion">
                        <div class="">
                            <span class="d-block p-2">título: Desarrollo Agrícola en el Perú</span>
                            <cite>Fuente: Youtube - Enterarse</cite>
                        </div>
                    </div>
                </div>


                <div class="contenido-publicacion ">
                    <div class="descripcion-imagen">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/NE8mWGn3c3s"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>

                    <div class="descripcion-publicacion">
                        <div class="">
                            <span class="d-block p-2">título: Perú 🇵🇪 Líder en la agricultura desértica</span>
                            <cite>Fuente: Youtube - Luis Centurión
                            </cite>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
