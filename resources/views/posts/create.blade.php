<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    {{ $user->username }}
@endsection



@section('contenido')
    <section class="registro-usuario">
        <div class="mi-contenedor">
            <div class="flex-evenly contenido-registro-usuario">
                <div class="registro-usuario-formulario espacio-arriba gris p-3">
                    <form action="{{ route('posts.store') }}" method="POST" class="" novalidate
                        enctype="multipart/form-data">
                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        <div class="form-group">
                            <label for="file" class="label-registro">Buscar mi Imagen</label>
                            <input class="caja-registro-usuario form-control w-100" name="file" type="file"
                                value="{{ old('file') }}" id="file" accept=".jpg, .jpeg, .png">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('file')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                            <div class="text-center my-3"> <img class="imagen-home" src="" id="imgPreviewPublicacion" alt="Nueva imagen" class="img-fluid"></div>    
                        </div>

                        <div class="form-group">
                            <label for="titulo" class="label-registro">Titulo</label>
                            <input type="text" id="titulo" name="titulo"
                                class="caja-registro-usuario form-control w-100" type="text" placeholder="Titulo"
                                autocomplete="off" value="{{ old('titulo') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('titulo')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="precio" class="label-registro">Precio</label>
                            <input type="text" id="precio" name="precio"
                                class="caja-registro-usuario form-control w-100" type="text" placeholder="Precio : 20.50"
                                autocomplete="off" value="{{ old('precio') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('precio')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="descripcion" class="label-registro">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" class="caja-registro-usuario form-control w-100" cols="30"
                                rows="7">{{ old('descripcion') }}</textarea>
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('descripcion')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div> <button type="submit" class="mi-boton boton-registro-usuario" id="">SUBIR
                                PUBLICACION...</button></div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
