<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Noticas
@endsection




@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->


    <section class="mb-5" id="">
        <div class="container">
            <div class="">
                <h1 class="text-center my-5">Noticias - Miagroperu</h1>
            </div>

            <style>
                iframe {
                    width: 100%;
                    height: 310px;
                    background-color: var(--green);
                }
            </style>
            <div class="row">
                <div class="col-md-6">
                    <div class="descripcion-imagen">
                        <iframe src="https://www.youtube.com/embed/hnhBMPYlvEo" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>

                    <div class="">
                        <div class="">
                            <span class="d-block p-2">título: Desarrollo Agrícola en el Perú</span>
                            <cite>Fuente: Youtube - Enterarse</cite>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="descripcion-imagen">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/NE8mWGn3c3s"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>

                    <div class="">
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



@section('footer')
    <!-- footer -->
    @include('helpers.footer')
    <!--  footer -->
@endsection
