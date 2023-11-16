<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Recuperar Contraseña
@endsection



@section('contenido')
    <section class="registro-usuario relleno">
        <div class="mi-contenedor">
            <div class="flex-evenly contenido-registro-usuario">
                <div class="registro-usuario-imagen espacio-arriba">
                    <img class="" src="{{ asset('img/usuario/register-user.jpg') }}" alt="">
                </div>

                <div class="registro-usuario-formulario">
                    <form action="{{ route('mail.update') }}" method="POST" class="" novalidate>
                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        {{-- MENSAJE SI ESTAN MAL LAS CREDENCIALES --}}
                        @if (session('mensaje'))
                            <div class="alert alert-success mt-2" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="email" class="label-registro">Digite su Email</label>
                            <input type="email" id="email" name="email"
                                class="caja-registro-usuario form-control w-100" placeholder="Tu Correo Electronico"
                                autocomplete="off" value="{{ old('email') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('email')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="label-registro">Nuevo Password</label>
                            <input type="password" name="password" placeholder="*************" id="password"
                                class="caja-registro-usuario form-control w-100" autocomplete="off">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('password')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="label-registro">Repetir Password</label>
                            <input type="password" name="password_confirmation" placeholder="*************"
                                id="password_confirmation" class="caja-registro-usuario form-control w-100"
                                autocomplete="off">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('password_confirmation')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div> <button type="submit" class="btn btn-success w-100 mt-3" id="">RECUPERAR
                                CONTRASEÑA</button></div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
