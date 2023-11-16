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
                    <div class="text-center alert alert-warning">Favor de ingresar el correo con el cual se registro en la plataforma</div>
                    <form action="{{ route('mail.send') }}" method="POST" class="" novalidate>
                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        {{-- MENSAJE SI ESTAN MAL LAS CREDENCIALES --}}
                        @if (session('mensaje'))
                            <div class="alert alert-success mt-2" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        {{-- MENSAJE SI ESTAN MAL LAS CREDENCIALES --}}
                        @if (session('sin_correo'))
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ session('sin_correo') }}
                            </div>
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

                        <div> <button type="submit" class="btn btn-success w-100 mt-3" id="">RECUPERAR
                                CONTRASEÑA</button></div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
