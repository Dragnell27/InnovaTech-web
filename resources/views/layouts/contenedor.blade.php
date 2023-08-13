@include('preloader')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Innova_tech - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/sales.js') }}"></script>
    <script src="{{ asset('js/JQuery.min.js') }}"></script>
</head>
<body>
    <header>
        <nav class="nav">
            <div class="class">
                <a href="{{ url('/') }}"><img src="{{ asset('img/logo-i.png') }}" id="imagen-logo"></a>
                <a id="btn-menu" onclick="toggleSidebar()"><img src="{{ asset('img/Menu.png') }}" id="menu-logo"></a>
                <div class="sidebar" style="background-color: white;" id="sidebar">
                    <a href="#"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <span class="fs-4"><img src="{{ asset('img/Logo-i.png') }}" height="50px"></span>
                        </a>
                    <ul id="sidebar-links">
                        @auth
                            <li class="links"><a class="ocultar" href="{{ route('users.show', Auth::user()->id) }}">Mi
                                    cuenta</a></li>
                        @else
                            <li class="links"><a class="ocultar" href="{{ route('login') }}">Iniciar Sesion</a></li>
                        @endauth ()
                        <li class="links"><a class="ocultar" href="{{ route('wishlist.index') }}">Lista De Deseos</a>
                        <li class="links"><a class="ocultar" href="{{ route('cart.show') }}" method="get" >Carrito</a>
                        </li>
                        @auth
                            <li class="links"><a href="{{ route('logout') }}">Cerrar sesion</a></li>
                        @endauth ()
                    </ul>
        <hr class="hr-sidebar">
                </div>
            </div>
            <ul class="nav-links">
                <i class="uil uil-times navCloseBtn"></i>
                @auth
                    <li class="links"><a href="{{ route('users.show', Auth::user()->id) }}">Mi cuenta</a></li>
                @else
                    <li class="links"><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                @endauth ()
                <li class="links"><a href="{{ route('wishlist.index') }}">Lista De Deseos</a></li>
                <li>
                    <form action="{{ Route('cart.show') }}" method="get">
                        <div id="icono">
                            <button type="submit" id="btnCarrito" class="">
                                <img src="{{ asset('img/Carro-Compras.png') }}" width="25px" height="20px"
                                    alt="">
                                <span class="">
                                    @if (Auth::check())
                                        <?php $CartCount = Cart::session(Auth::user()->id)
                                            ->getContent()
                                            ->count(); ?>
                                    @else
                                        <?php $CartCount = Cart::getContent()->count(); ?>
                                    @endif
                                    {{ $CartCount }}
                                    <span class="visually-hidden "></span>
                                </span>
                            </button>
                        </div>
                    </form>
                </li>
                @auth
                    <li class="links"><a href="{{ route('logout') }}">Cerrar sesion</a></li>
                @endauth ()
            </ul>

            <i class="uil uil-search search-icon" id="searchIcon"></i>
            <div class="search-box">
                <i class="uil uil-search search-icon"></i>
                <input type="text" placeholder="Buscar en innovatech..." />
            </div>
        </nav>
    </header>
    @yield('component')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    {{-- scripts de categorias del sidebar --}}
    <script src="{{ asset('js/categories.js') }}"></script>
    {{-- agrego el js del carrito --}}
    <script src="{{ asset('js/carrito.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" >
    </script>
    </script>
</body>
</html>
