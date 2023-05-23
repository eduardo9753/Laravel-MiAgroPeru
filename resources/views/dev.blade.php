<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    Anthony Eduardo Nuñez Canchari
@endsection


@section('contenido')
    <section class="" id="">
        <div class="mi-contenedor center espacio-entre relleno gris">
            <div class="publicacion-imagen espacio-arriba">
                <img class="imagen-home" src="{{ asset('img/dev/dev.jpg') }}" alt="">
            </div>

            @php
                $anio_actual = Date('Y');
                $anio_nacimiento = 1997;
                $edad = $anio_actual - $anio_nacimiento;
            @endphp

            <div class="">
                <p>Hola soy Anthony Eduardo Nuñez Canchari creador de esta Plataforma</p>
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
                            <p><a target="_bank"
                                    href="https://github.com/eduardo9753?tab=repositories"><i class='bx bxl-github tamanio-icon' style='color:#000000' ></i></a></p>
                            <p><i class='bx bxl-whatsapp tamanio-icon' style='color:#26c942'  ></i>922 394 642</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mi-contenedor center espacio-entre relleno gris mt-2">
            <div class="publicacion-descripcion">
                <p class="">Ayudanos a Crecer juntos para llegar a mas Peruanos</p>
                <p class="">Donaciones Voluntarias</p>
                <p class="estilo-dev">Cuenta BCP: 19102207218012 - CCI: 00219110220721801251</p>
            </div>
        </div>
    </section>
@endsection
