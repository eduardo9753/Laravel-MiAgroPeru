<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Iniciar Session
@endsection



@section('contenido')
    <section class="registro-usuario relleno">
        <div class="mi-contenedor">
            <div class="flex-evenly contenido-registro-usuario">
                <div class="registro-usuario-imagen espacio-arriba">
                    <img class="" src="{{ asset('img/usuario/register-user.jpg') }}" alt="">
                </div>

                <div class="registro-usuario-formulario">
                    <form action="{{ route('login') }}" method="POST" class="" novalidate>
                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        {{-- MENSAJE SI ESTAN MAL LAS CREDENCIALES --}}
                        @if (session('mensaje'))
                            <p class="error-registro-usuario">{{ session('mensaje') }}</p>
                        @endif


                        <div class="form-group">
                            <label for="email" class="label-registro">Email</label>
                            <input type="email" id="email" name="email"
                                class="caja-registro-usuario form-control w-100" type="text"
                                placeholder="Tu Correo Electronico" autocomplete="off" value="{{ old('email') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('email')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="label-registro">Password</label>
                            <input type="password" name="password" placeholder="*************" id="password"
                                class="caja-registro-usuario form-control w-100" type="text" autocomplete="off">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('password')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-3 form-check">
                            <input type="checkbox" name="remenber" class="form-check-input caja-registro-usuario"
                                id="mantenerSession">
                            <label class="form-check-label" for="mantenerSession">Mantener mi Session</label>
                        </div>


                        <div> <button type="submit" class="mi-boton boton-registro-usuario"
                                id="">INGRESAR</button></div>
                    </form>
                </div>
            </div>
            <div class="text-center">
                <p>No recuerdas? <a href="{{ route('mail.index') }}">Recuperar Contraseña</a></p>
            </div>
        </div>
    </section>
@endsection
