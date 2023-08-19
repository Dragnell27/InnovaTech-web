@include('preloader')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Innova_tech - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/unicons.css') }}">
    <script>
        var baseURL = "{{ url('/') }}";
    </script>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    <script src="{{ asset('js/JQuery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
</head>

<body>
    <header>
        <nav class="nav">
            <div class="class">
                <a href="{{ url('/') }}"><img src="{{ asset('img/Logo-i.png') }}" id="imagen-logo"></a>
                <a id="btn-menu" onclick="toggleSidebar()"><img src="{{ asset('img/menu.png') }}" id="menu-logo"></a>
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
                        <li class="links"><a class="ocultar" href="{{ route('cart.show') }}"
                                method="get">Carrito</a>
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
                                <img src="{{ asset('img/carro_compra.png') }}" width="25px" height="20px"
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

            <i class="uil search-icon" id="searchIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg></i>
            <div class="search-box">
                <i class="uil search-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></i>
                <form action="{{ route('products.search') }}" method="POST">
                    @csrf
                    <input type="text" name="query" id="query" placeholder="Buscar en innovatech..." />
                    <button type="submit" id="botonOculto" style="display: none;"></button>
                </form>
                <div class="" id="sugerenciasContainer">

                </div>
            </div>
        </nav>
    </header>
    <div id="componente">
        @yield('component')
    </div>
    <script src="{{ asset('js/header.js') }}"></script>
    {{-- scripts de categorias del sidebar --}}
    <script src="{{ asset('js/categories.js') }}"></script>
    {{-- agrego el js del carrito --}}
    <script src="{{ asset('js/carrito.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('js')
    <script src="{{ asset('js/preloader.js') }}"></script>
    <!-- Bootstrap JS -->

</body>

</html>
