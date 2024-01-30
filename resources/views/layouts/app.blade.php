<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->

    <meta name="keywords"
        content="miagroperu,miagro,mi agro peru,agro peru,agro peru famil,vender mis productos,promocionar mis productos, MIAGROPERU, miagroperu.familc.com, MIAGROPERU.FAMILC.COM, agricultura, productos, subir productos, promocionar productos, promocionar mis productos, vender mis productos, promocionamos agricultura peruana">
    <meta name="description"
        content="Red Social orientado hacia los agricultores peruanos para poder promocionar sus productos en la web , podrás subir tus productos para que tus compradores puedan estar en contacto contigo y asi poder venderlos">

    <title>MiAgroPeru - @yield('titulo')</title>

    <!-- ICONO DEL PROYECTO -->
    <link rel="shortcut icon" href="{{ asset('img/logos/logo.png') }}">

    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/home/bootstrap.min.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/generales.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colores.css') }}">

    <!-- estilos login-->
    <link rel="stylesheet" href="{{ asset('css/auth/registro.css') }}">


    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/home/responsive.css') }}">

    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/home/jquery.mCustomScrollbar.min.css') }}">


    <!--Notify-->
    <script src="{{ asset('notify/notify.js') }}" defer></script>

    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">


    <!-- CDN JQUERY -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>

    <!-- MAIN HTML -->
    <main>
        <!--CONTENIDO GENERAL DE TODAS LAS PAGINAS-->
        @yield('contenido')
    </main>


    <!-- FOOTER HTML -->
    @yield('footer')


</body>

<!-- CDN JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<!-- CDN JQUERY -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!-- CARGA DE IMAGEN CDN -->

<!-- end footer -->
<!-- Javascript files-->
<script src="{{ asset('js/home/jquery.min.js') }}"></script>
<script src="{{ asset('js/home/popper.min.js') }}"></script>
<script src="{{ asset('js/home/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/home/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('js/home/plugin.js') }}"></script>
<!-- sidebar -->
<script src="{{ asset('js/home/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/home/custom.js') }}"></script>

<!-- SCRIPT LIVEWIRE -->
@livewireScripts

</html>
