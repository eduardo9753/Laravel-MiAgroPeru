<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="{{ asset('img/home/loading.gif') }}" alt="#" /></div>
</div>
<!-- end loader -->



<!-- header -->
<header>
    <!-- header inner -->
    <div class="header">

        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img class="imagen-logo"
                                        src="{{ asset('img/logos/logo.png') }}" alt="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <div class="location_icon_bottum_tt">
                        <ul>
                            <li><img src="{{ asset('icon/email1.png') }}" />miagroperu2023@gmail.com</li>

                            <li><img src="{{ asset('icon/call1.png') }}" />(+51)924 080 517</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 location_icon_bottum">
                    <div class="row">
                        <div class="col-md-8 ">
                            <div class="menu-area">
                                <div class="limit-box">
                                    @guest
                                        <nav class="main-menu">
                                            <ul class="menu-area-main">
                                                <li class="active"> <a href="{{ route('home') }}">Home</a> </li>
                                                <li><a href="{{ route('blog.index') }}">Noticias</a> </li>
                                                <li><a href="#product">Products</a></li>
                                                <li><a href="{{ route('register') }}">Registrarme</a></li>
                                                <li><a href="{{ route('login') }}">Ingresar</a></li>
                                            </ul>
                                        </nav>
                                    @endguest


                                    @auth
                                        <nav class="main-menu">
                                            <ul class="menu-area-main">
                                                <li class="active"> <a href="{{ route('home') }}">Home</a> </li>
                                                <li><a href="{{ route('posts.publicacion') }}">Publicaciones</a></li>
                                                <li><a href="{{ route('posts.create') }}">Publicar</a></li>
                                                <li><a href="{{ route('posts.index', auth()->user()) }}">Perfil</a> </li>
                                                <li><a href="{{ route('posts.colaborador') }}">Colaboradores</a></li>

                                                <li>
                                                    <form action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger w-100">Salir</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </nav>
                                    @endauth
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                            <form class="search">
                                <input class="form-control" type="text" placeholder="Search">
                                <button><img src="{{ asset('img/home/search_icon.png') }}"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header inner -->
</header>
<!-- end header -->
