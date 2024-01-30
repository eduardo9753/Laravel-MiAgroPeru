<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Iniciar Session
@endsection



@section('contenido')
    <section class="mt-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-5 mt-5">
                    <div class="registro-usuario-imagen">
                        <img class="" src="{{ asset('img/usuario/register-user.jpg') }}" alt="">
                    </div>
                </div>

                <div class="col-md-7 mt-5">
                    <form action="{{ route('login') }}" method="POST" class="" novalidate>
                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        {{-- MENSAJE SI ESTAN MAL LAS CREDENCIALES --}}
                        @if (session('mensaje'))
                            <p class="text-danger">{{ session('mensaje') }}</p>
                        @endif


                        <div class="form-group">
                            <label for="email" class="label-registro">Email</label>
                            <input type="email" id="email" name="email" class="form-control w-100 border-input"
                                type="text" placeholder="Tu Correo Electronico" value="{{ old('email') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="label-registro">Password</label>
                            <input type="password" name="password" placeholder="*************" id="password"
                                class="form-control w-100 border-input" type="text">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-3 form-check">
                            <input type="checkbox" name="remenber" class="form-check-input" id="mantenerSession">
                            <label class="form-check-label" for="mantenerSession">Mantener mi Session</label>
                        </div>


                        <div> <button type="submit" class="btn btn-success w-100 mt-3" id="">INGRESAR</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <a href="{{ route('mail.index') }}" class="btn btn-outline-success">Recuperar Contraseña</a>
                <a href="{{ route('home') }}" class="btn btn-success">Ir a Casa</a>
            </div>
        </div>
    </section>
@endsection
