<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Recuperar Contraseña
@endsection



@section('contenido')
    < <section class="mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mt-5">
                    <div class="registro-usuario-imagen">
                        <img class="" src="{{ asset('img/usuario/register-user.jpg') }}" alt="">
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="registro-usuario-formulario">
                        <div class="text-center alert alert-warning">Favor de ingresar el correo con el cual se registró en
                            la plataforma</div>
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
                                <input type="email" id="email" name="email" class="border-input form-control w-100"
                                    type="text" placeholder="Tu Correo Electronico" autocomplete="off"
                                    value="{{ old('email') }}">
                                {{-- VALIDACION CON VALIDATE --}}
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div> <button type="submit" class="btn btn-success w-100 mt-3" id="">RECUPERAR
                                    CONTRASEÑA</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-5">
                <a href="{{ route('register') }}" class="btn btn-outline-success">Registrarme</a>
                <a href="{{ route('home') }}" class="btn btn-success">Ir a Casa</a>
            </div>
        </div>
        </section>
    @endsection
