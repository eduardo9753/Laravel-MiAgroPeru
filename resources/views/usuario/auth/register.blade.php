<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Registrarme
@endsection



@section('contenido')
    <section class="registro-usuario">
        <div class="mi-contenedor">
            <div class="flex-evenly contenido-registro-usuario">
                <div class="registro-usuario-imagen espacio-arriba">
                    <img class="" src="{{ asset('img/usuario/register-user.jpg') }}" alt="">
                </div>

                <div class="registro-usuario-formulario">
                    <form action="{{ route('register') }}" method="POST" class="" novalidate>
                        {{-- TOKEN DE SEGURIDAD --}}
                        @csrf

                        <div class="form-group">
                            <label for="name" class="label-registro espacio-arriba">Nombre</label>
                            <input type="text" id="name" name="name"
                                class="caja-registro-usuario form-control w-100" 
                                placeholder="Nombres" autocomplete="off" value="{{ old('name') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('name')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="celular" class="label-registro">Celular</label>
                            <input type="text" id="celular" name="celular"
                                class="caja-registro-usuario form-control w-100" 
                                placeholder="Numero de Celular" autocomplete="off" value="{{ old('celular') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('celular')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username" class="label-registro">Username</label>
                            <input type="text" id="username" name="username"
                                class="caja-registro-usuario form-control w-100" 
                                placeholder="Tu Nombre de Usuario" autocomplete="off" value="{{ old('username') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('username')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="label-registro">Email</label>
                            <input type="email" id="email" name="email"
                                class="caja-registro-usuario form-control w-100" 
                                placeholder="Tu Correo Electronico" autocomplete="off" value="{{ old('email') }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('email')
                                <p class="error-registro-usuario">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="label-registro">Password</label>
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

                        <div> <button type="submit" class="btn btn-success w-100 mt-3"
                                id="">REGISTRARME</button></div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
