<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    <script src="{{ asset('js/header.js') }}"></script>

</head>

<body>
    <header>
        <nav class="nav">
            <i class="uil uil-bars navOpenBtn"></i>
            <a href="{{ url('/') }}" class="logo"><span style="color: red;">In</span>novatech</a>

            <ul class="nav-links">
                <i class="uil uil-times navCloseBtn"></i>
                @auth
                    <li class="links"><a href="{{ route('users.show',Auth::user()->id) }}">Mi cuenta</a></li>
                @else
                    <li class="links"><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                @endauth ()
                <li class="links"><a href="{{ route('productos') }}">Productos</a></li>
                <li class="links"><a href="@auth
                    {{route('wishlist.show',Auth::user()->id)}}
                @endauth">Lista De Deseos</a></li>
                <li class="links"><a href="#">Carrito</a></li>
                <li>
                    <form action="{{ Route('cart.show') }}" method="get">
                        <div id="icono">
                            <button type="submit" id="btnCarrito" class="">
                                <img src="{{ asset('img/Carro-Compras.png') }}" width="25px" height="20px"
                                    alt="">
                                <span class="">
                                   {{ Cart::getContent()->count() }} 
                                    <span class="visually-hidden "></span>
                                </span>
                            </button>
                        </div>
                    </form>


                </li>
                @auth
                    <li class="links"><a href="{{ route('logout') }}">Cerrar sesion</a></li>
                @endauth ()
                <li>

                </li>
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
    {{-- agrego el js del carrito --}}
    <script src="{{ asset('js/carrito.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
