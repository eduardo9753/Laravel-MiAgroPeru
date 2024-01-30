<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


{{-- TITULO DEL HEAD --}}
@section('titulo')
    Perfil : {{ auth()->user()->username }}
@endsection



@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->



    <section class="mt-5">
        <div class="container">
            <form action="{{ route('perfil.store') }}" method="POST" class="" enctype="multipart/form-data">
                {{-- TOKEN DE SEGURIDAD --}}
                @csrf
                <div class="row">

                    <div class="col-md-6 mx-auto">

                        <div class="text-center">
                            <label for="">Foto Actual</label>
                            <img class="imagen-publicaciones" src="{{ asset('perfiles/' . auth()->user()->imagen) }}" alt="">
                        </div>

                        <div class="form-group">
                            <label for="username" class="">Username</label>
                            <input type="text" id="username" name="username" class="form-control border-input w-100" type="text"
                                placeholder="Nombre de Usuario" autocomplete="off" value="{{ auth()->user()->username }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('username')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="celular" class="">Celular</label>
                            <input type="text" id="celular" name="celular" class="form-control border-input w-100"
                                placeholder="Numero de Celular" autocomplete="off" value="{{ auth()->user()->celular }}">
                            {{-- VALIDACION CON VALIDATE --}}
                            @error('celular')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="">Nueva Imagen de Perfil</label>
                            <input type="file" id="imagen" name="imagen" class="form-control border-input w-100" type="text"
                                accept=".jpg, .jpeg, .png">
                            <div class="text-center my-3"> <img class="imagen-publicaciones" src="" id="imgPreview"
                                    alt="Nueva imagen" class="img-fluid"></div>
                        </div>

                        <div> <button type="submit" class="btn btn-success w-100" id="">Actualizar Mis
                                Datos</button></div>
                    </div>
                </div>
            </form>
            <script src="{{ asset('js/cargarImagen.js') }}"></script>
        </div>
    </section>
@endsection



@section('footer')
    <!-- footer -->
    @include('helpers.footer')
    <!--  footer -->
@endsection
