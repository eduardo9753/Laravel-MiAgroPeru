<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    {{ $user->username }}
@endsection



@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->



    <section class="my-5">
        <div class="container">
            <div class="">
                <div class="espacio-arriba p-3">
                    <form action="{{ route('posts.store') }}" method="POST" class="" novalidate
                        enctype="multipart/form-data">
                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        <div class="row">
                            <div class="col-md-8 mx-auto fondo-publicaciones">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="file" class="my-2">Buscar mi Imagen</label>
                                            <input class="form-control w-100 border-input" name="file" type="file"
                                                value="{{ old('file') }}" id="file" accept=".jpg, .jpeg, .png">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('file')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="text-center my-3"> <img class="imagen-home" src=""
                                                    id="imgPreviewPublicacion" alt="Nueva imagen" class="img-fluid"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titulo" class="my-2">Titulo</label>
                                            <input type="text" id="titulo" name="titulo"
                                                class="form-control w-100 border-input" placeholder="Titulo"
                                                autocomplete="off" value="{{ old('titulo') }}">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('titulo')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="precio" class="my-2">Precio</label>
                                            <input type="text" id="precio" name="precio"
                                                class="form-control border-input w-100" placeholder="Precio : 20.50"
                                                autocomplete="off" value="{{ old('precio') }}">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('precio')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="descripcion" class="my-2">Descripcion</label>
                                            <textarea name="descripcion" id="descripcion" class="form-control border-input w-100" cols="30" rows="7">{{ old('descripcion') }}</textarea>
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('descripcion')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 mt-3" id="">SUBIR
                                        PUBLICACIÓN</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <script src="{{ asset('js/cargarImagenPublicacion.js') }}"></script>
        </div>
    </section>
@endsection


@section('footer')
    <!-- footer -->
    @include('helpers.footer')
    <!--  footer -->
@endsection
