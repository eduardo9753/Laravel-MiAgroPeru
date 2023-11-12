<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Perfil : {{ auth()->user()->username }}
@endsection



@section('contenido')
    <section class="registro-usuario relleno">
        <div class="mi-contenedor">
            <form action="{{ route('perfil.store') }}" method="POST" class="" enctype="multipart/form-data">
                {{-- TOKEN DE SEGURIDAD --}}
                @csrf
                <div class="flex-evenly contenido-registro-usuario">

                    <div class="registro-usuario-formulario">

                        <div class="text-center">
                            <label for="" >Foto Actual</label>
                            <img class="imagen-home" src="{{ asset('perfiles/' . auth()->user()->imagen) }}" alt="">
                        </div>

                        <div class="form-group">
                            <label for="username" class="label-registro">Username</label>
                            <input type="text" id="username" name="username"
                                class="caja-registro-usuario form-control w-100" type="text"
                                placeholder="Nombre de Usuario" autocomplete="off" value="{{ auth()->user()->username }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('username')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="celular" class="label-registro">Celular</label>
                            <input type="text" id="celular" name="celular"
                                class="caja-registro-usuario form-control w-100" 
                                placeholder="Numero de Celular" autocomplete="off" value="{{ auth()->user()->celular }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('celular')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="label-registro">Nueva Imagen de Perfil</label>
                            <input type="file" id="imagen" name="imagen"
                                class="caja-registro-usuario form-control w-100" type="text"
                                accept=".jpg, .jpeg, .png">
                                <div class="text-center my-3"> <img class="imagen-home" src="" id="imgPreview" alt="Nueva imagen" class="img-fluid"></div>    
                        </div>

                        <div> <button type="submit" class="btn btn-success w-100"
                                id="">Actualizar Mis Datos</button></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
