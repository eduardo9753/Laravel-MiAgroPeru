<!--TEMPLATE PRINCIPAL-->
@extends('layouts.app')


@section('titulo')
    MiAgroPeru
@endsection




@section('contenido')
    <!-- header -->
    @include('helpers.header')
    <!-- end header -->


    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="{{ asset('img/carousel/carousel_1.jpg') }}" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>Registrate</h1>
                            <span>EN MIAGROPERU</span>

                            <p><strong>La plataforma de los agricultores peruanos.</strong> Regístrate, publica tus
                                productos y conecta con
                                más peruanos.</p>
                            <a class="buynow" href="{{ route('login') }}">Ingresar</a><a class="buynow ggg"
                                href="{{ route('register') }}">Registrarme</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="{{ asset('img/carousel/carousel_2.jpg') }}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>Publica</h1>
                            <span>EN MIAGROPERU</span>

                            <p>Comparte tus productos para alcanzar a un público más amplio y promocionarlos en nuestra
                                plataforma.</p>
                            <a class="buynow" href="{{ route('login') }}">Ingresar</a><a class="buynow ggg"
                                href="{{ route('register') }}">Registrarme</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="{{ asset('img/carousel/carousel_3.jpg') }}" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>Enlaza</h1>
                            <span>EN MIAGROPERU</span>

                            <p>Sigue a nuevos usuarios para mantenerte actualizado con productos novedosos de diversos
                                sectores y rangos de precios.</p>
                            <a class="buynow" href="{{ route('login') }}">Ingresar</a><a class="buynow ggg"
                                href="{{ route('register') }}">Registrarme</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>


    <!-- about -->
    <div id="about" class="about">
        <div class="container">
            <div class="row">

                <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
                    <div class="about_box">
                        <h2>miagroperu<br><strong class="black">plataforma de agricultura</strong></h2>
                        <p>Una iniciativa que impulsa los productos de <strong>nuestros agricultores peruanos</strong>.
                            Regístrate en nuestro
                            portal y comparte tus productos para que puedan ponerse en contacto contigo.</p>
                        <a href="{{ route('register') }}">Registrarme</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2">
                    <div class="about_img">
                        <figure><img src="{{ asset('img/home/about.png') }}" alt="img" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->


    <!-- for_box -->
    <div class="for_box_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 co-sm-l2">
                    <div class="for_box">
                        <i><img src="{{ asset('img/home/1.png') }}" alt="#" /></i>
                        <span>+</span>
                        <h3>agricultura</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 co-sm-l2">
                    <div class="for_box">
                        <i><img src="{{ asset('img/home/2.png') }}" alt="#" /></i>
                        <span>+</span>
                        <h3>ganado</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 co-sm-l2">
                    <div class="for_box">
                        <i><img src="{{ asset('img/home/3.png') }}" alt="#" /></i>
                        <span>+</span>
                        <h3>frutas y vegetales</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 co-sm-l2">
                    <div class="for_box">
                        <i><img src="{{ asset('img/home/4.png') }}" alt="#" /></i>
                        <span>+</span>
                        <h3>desde el campo</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end for_box -->


    <!-- offer -->
    <div class="offer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Productos <strong class="black"> Peruanos</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 ">
                        <div class="offer_box">
                            <h3>Productos de agricultura</h3>
                            <figure><img src="{{ asset('img/home/offer1.png') }}" alt="img" /></figure>
                            <p>Productos agrícolas cultivados por manos peruanas, apoyamos al talento nacional</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin_ttt">
                        <div class="offer_box">
                            <h3>Verduras y Vegetales</h3>
                            <figure><img src="{{ asset('img/home/offer2.png') }}" alt="img" /></figure>
                            <p>Verduras, vegetales y más para el consumo de tu hogar, cultivados por agricultores peruanos.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin-lkk">
                        <div class="offer_box">
                            <h3>Campos Peruanos</h3>
                            <figure><img src="{{ asset('img/home/offer3.png') }}" alt="img" /></figure>
                            <p>Apoyando el crecimiento de los agricultores peruanos y ofreciendo lo mejor del campo</p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <a href="{{ route('register') }}" class="read-more">Registrarme</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end offer -->


    <!-- product -->
    <div id="product" class="product">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Más <strong class="black"> productos</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                            <div class="product_box">
                                <figure>
                                    <img src="{{ asset('uploads/' . $post->imagen) }}" alt="#" />
                                    <h3>{{ $post->titulo }}</h3>
                                </figure>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end product -->


    <!-- clients -->
    <div id="testimonial" class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>testimonial</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clients_red">
        <div class="container">
            <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#testimonial_slider" data-slide-to="0" class=""></li>
                    <li data-target="#testimonial_slider" data-slide-to="1" class="active"></li>
                    <li data-target="#testimonial_slider" data-slide-to="2" class=""></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <div class="testomonial_section">

                            <div class="full testimonial_cont text_align_center cross_layout">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pa_right">
                                        <div class="testomonial_img">
                                            <i><img src="{{ asset('img/logos/logo.png') }}" alt="#" /></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pa_left">
                                        <div class="cross_inner">
                                            <h3>adkadan<br><strong class="ornage_color">usuario - miagroperu</strong></h3>
                                            <p><img src="{{ asset('icon/1.png') }}" alt="#" />Una plataforma
                                                destacada para respaldar a los agricultores de manera efectiva.
                                                <img src="{{ asset('icon/2.png') }}" alt="#" />
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item active">

                        <div class="testomonial_section">
                            <div class="full center">
                            </div>
                            <div class="full testimonial_cont text_align_center cross_layout">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pa_right">
                                        <div class="testomonial_img">
                                            <i><img src="{{ asset('img/logos/logo.png') }}" alt="#" /></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pa_left">
                                        <div class="cross_inner">
                                            <h3>sagasyuzz<br><strong class="ornage_color">usuario - miagroperu</strong>
                                            </h3>
                                            <p><img src="{{ asset('icon/1.png') }}" alt="#" />Una excelente página
                                                para subir y promocionar cualquier producto del campo.
                                                <img src="{{ asset('icon/2.png') }}" alt="#" />
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="carousel-item">

                        <div class="testomonial_section">
                            <div class="full center">
                            </div>
                            <div class="full testimonial_cont text_align_center cross_layout">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pa_right">
                                        <div class="testomonial_img">
                                            <i><img src="{{ asset('img/logos/logo.png') }}" alt="#" /></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pa_left">
                                        <div class="cross_inner">
                                            <h3>jordy<br><strong class="ornage_color">usuario - miagroperu</strong></h3>
                                            <p><img src="{{ asset('icon/1.png') }}" alt="#" />Un gran respaldo
                                                para los agricultores, permitiéndoles promocionar sus productos en línea.
                                                <img src="{{ asset('icon/2.png') }}" alt="#" />
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end clients -->


    <!-- contact -->
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>¿sugerencias?<strong class="black"> escribenos</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid padddd">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 padddd">
            <div class="map_section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                            <form class="main_form">
                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Nombres" type="text" name="Nombres">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Email" type="text" name="Email">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Celular" type="text" name="Celular">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button class="send">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="map">
                </div>

            </div>
        </div>
    </div>
    <!-- end contact -->


    <!-- javascript -->
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
@endsection



@section('footer')
    <!-- footer -->
    @include('helpers.footer')
    <!--  footer -->
@endsection
