<div>
    <input type="checkbox" id="btn-menu">
    <label class="contenedor-menu" for="btn-menu"> {{-- ESTE DIV SE CAMBIO POR UN LABEL PARA TENER EL "for=""" --}}
        <div class="contenido-menu">
            <nav>
                <ul class="menu-item">
                    <li class="item"><a href="{{ route('login') }}">Ingresar</a></li>
                    <li class="item"><a href="{{ route('register') }}">Registrarse</a></li>
                    <li class="item mt-2">
                        <div class="mi-contenedor">
                            <form class="d-flex" action="{{ route('post.search') }}" method="GET">
                                <input class="form-control me-2" required type="search" name="titulo" placeholder="Digite su producto"
                                    aria-label="Search">
                                <button class="btn btn-outline-success text-white" type="submit">Buscar</button>
                            </form>
                        </div>
                    </li>
                    {{-- <li class="center">
                         COMPONENTE DEL CLIMA 
                        @include('helpers.weather')
                    </li> --}}
                </ul>
            </nav>
            <label for="btn-menu"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-x"
                    width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                    <path d="M10 10l4 4m0 -4l-4 4" />
                </svg></label>
        </div>
    </label>{{-- ESTE DIV SE CAMBIO POR UN LABEL PARA TENER EL "for=""" --}}

    <nav id="navegador">
        <div class="mi-contenedor">
            <div class="navegador-flex">

                <label for="btn-menu">
                    <div class="logo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2"
                            width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 6l16 0" />
                            <path d="M4 12l16 0" />
                            <path d="M4 18l16 0" />
                        </svg>
                        <p>MIAGROPERU</p>
                    </div>
                </label>

                <div class="caja-img">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logos/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
