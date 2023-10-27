<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    Anthony Eduardo Nuñez Canchari
@endsection


@section('contenido')
    <section class="grupo">
        <div class="mi-contenedor grid-tres espacio-entre relleno gris">
            <div class="publicacion-imagen espacio-arriba">
                <div class="text-center">
                    <img class="imagen-home" src="{{ asset('img/dev/dev.jpg') }}" alt="">
                </div>
                @php
                    $anio_actual = Date('Y');
                    $anio_nacimiento = 1997;
                    $edad = $anio_actual - $anio_nacimiento;
                @endphp
                <div class="p-5">
                    <p>Hola soy Anthony Eduardo Nuñez Canchari</p>
                    <p>soy Ingeniero de Sistemas Computacionales</p>
                    <p>tengo {{ $edad }} de edad</p>

                    <div class="mt-3">
                        <div>
                            <div>
                                <p>Mis redes Sociales son: </p>
                            </div>
                            <div>
                                <p><a target="_bank"
                                        href="https://www.linkedin.com/in/anthony-eduardo-nu%C3%B1ez-canchari-05b1371a0/"><i
                                            class='bx bxl-linkedin-square tamanio-icon' style='color:#2229c7'></i></a></p>
                                <p><a target="_bank" href="https://github.com/eduardo9753?tab=repositories"><i
                                            class='bx bxl-github tamanio-icon' style='color:#000000'></i></a></p>
                                <p><i class='bx bxl-whatsapp tamanio-icon' style='color:#26c942'></i>922 394 642</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="publicacion-imagen espacio-arriba">
                <div class="text-center">
                    <img class="imagen-home" src="{{ asset('img/dev/jordy.jpeg') }}" alt="">
                </div>
               
                @php
                    $anio_actual = Date('Y');
                    $anio_nacimiento = 1997;
                    $edad = $anio_actual - $anio_nacimiento;
                @endphp
                <div class="p-5">
                    <p>Hola soy Jordy Sauñe Lozano estudie Tripulante de Cabina en Columbia </p>
                    <p>tengo {{ $edad }} de edad</p>

                    <div class="mt-3">
                        <div>
                            <div>
                                <p>Mis redes Sociales son: </p>
                            </div>
                            <div>
                                <p></p>
                                <p><i class='bx bxl-whatsapp tamanio-icon' style='color:#26c942'></i>961 067 711</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="publicacion-imagen espacio-arriba">
                <div class="text-center">
                    <img class="imagen-home" src="{{ asset('img/dev/adan.jpeg') }}" alt="">
                </div>
              
                @php
                    $anio_actual = Date('Y');
                    $anio_nacimiento = 1999;
                    $edad = $anio_actual - $anio_nacimiento;
                @endphp
                <div class="p-5">
                    <p>Hola soy Adan Kard Avalos Garcia</p>
                    <p>soy Administrador de Empresas</p>
                    <p>tengo {{ $edad }} de edad</p>

                    <div class="mt-3">
                        <div>
                            <div>
                                <p>Mis redes Sociales son: </p>
                            </div>
                            <div>
                                <p></p>
                                <p><i class='bx bxl-whatsapp tamanio-icon' style='color:#26c942'></i>961 106 028</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
