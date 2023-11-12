<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    {{ $user->username }}
@endsection



@section('contenido')
    <section class="registro-usuario">
        <div class="mi-contenedor">
            <div class="contenido-registro-usuario">
                <div class="espacio-arriba gris p-3">
                    <form action="{{ route('posts.store') }}" method="POST" class="" novalidate
                        enctype="multipart/form-data">
                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="file" class="label-registro my-2">Buscar mi Imagen</label>
                                            <input class="caja-registro-usuario form-control w-100" name="file"
                                                type="file" value="{{ old('file') }}" id="file"
                                                accept=".jpg, .jpeg, .png">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('file')
                                                <p class="error-registro-usuario">{{ $message }}</p>
                                            @enderror
                                            <div class="text-center my-3"> <img class="imagen-home" src=""
                                                    id="imgPreviewPublicacion" alt="Nueva imagen" class="img-fluid"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titulo" class="label-registro my-2">Titulo</label>
                                            <input type="text" id="titulo" name="titulo"
                                                class="caja-registro-usuario form-control w-100" placeholder="Titulo"
                                                autocomplete="off" value="{{ old('titulo') }}">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('titulo')
                                                <p class="error-registro-usuario">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="precio" class="label-registro my-2">Precio</label>
                                            <input type="text" id="precio" name="precio"
                                                class="caja-registro-usuario form-control w-100"
                                                placeholder="Precio : 20.50" autocomplete="off" value="{{ old('precio') }}">
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('precio')
                                                <p class="error-registro-usuario">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="descripcion" class="label-registro my-2">Descripcion</label>
                                            <textarea name="descripcion" id="descripcion" class="caja-registro-usuario form-control w-100" cols="30"
                                                rows="7">{{ old('descripcion') }}</textarea>
                                            {{-- VALIDACION CON VALIDATE --}}
                                            @error('descripcion')
                                                <p class="error-registro-usuario">{{ $message }}</p>
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

        </div>
    </section>
@endsection
