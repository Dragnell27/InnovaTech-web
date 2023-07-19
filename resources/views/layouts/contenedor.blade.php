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

    {{-- <link rel="stylesheet" href="{{asset('css/app.js')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/categorias.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/comentarios.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/inicioSesion.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/productos.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/registro.css')}}"> --}}

    {{-- <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script> --}}
    <script src="{{asset('js/header.js')}}"></script>
    {{-- <script src="{{asset('js/registro.js')}}"></script>
    <script src="{{asset('js/ubicaciones.js')}}"></script> --}}
</head>

<body>
    <header>
        <nav class="nav">
            <i class="uil uil-bars navOpenBtn"></i>
            <a href="{{ route('home') }}" class="logo"><span style="color: red;">In</span>novatech</a>

            <ul class="nav-links">
                <i class="uil uil-times navCloseBtn"></i>

                <li class="links"><a href="{{ url('/iniciar_sesion')}}">Iniciar Sesion</a></li>
                <li class="links"><a href="{{ route('productos') }}">Productos</a></li>
                <li class="links"><a href="#">Lista De Deseos</a></li>
                <li class="links"><a href="#">Carrito</a></li>
                <li>
                    <form action="{{ Route('cart.show') }}" method="get">
                        <div id="icono">
                            <button type="submit" id="btnCarrito" class="">
                                <img src="{{ asset('img/Carro-Compras.png') }}" width="25px" height="20px" alt="">
                                <span class="">
                                    {{-- {{ Cart::getContent()->count() }} --}}
                                    <span class="visually-hidden "></span>
                                </span>
                            </button>
                    </form>
                    </div>
                    <div id="cart-products" style="display: none">
                        <ul id="prodUl">

                            {{-- @if (Cart::getContent()->count() <= 0) <h3> Tienes 0 articulos en el carrito</h3>
                                @else
                                @foreach (Cart::getContent() as $prod)
                                <li class="liPro">
                                    <h5>{{ $prod->name }}</h5>
                                    <div>
                                        Precio: {{ $prod->price }}
                                    </div>

                                </li>
                                <hr>
                                @endforeach
                                @endif --}}

                        </ul>
                        <a href="{{ Route('cart.show') }}" class="btn btn-primary"> Ver carrito</a>

                    </div>
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
    <footer>
        <div id="divfooter">
            <div class="modovertical1" id="infofooter">
                <div>
                    <img id="logo" src="{{ asset('img/Logo-Innova.jpeg') }}">
                </div>
                <div id="descripcionfooter">
                    <p style="color: white;">NIT 900.726.066-7 <br>CLL 52 3-80 LOCAL 210 CC. Unico Outlet, Cali.<br>
                        Ventas@innovatechdeoccidente.com <br>+57 314 650 66 30</p><br>
                </div>
            </div>
            <div class="modovertical2">
                <b>
                    <center>
                        <h4 style="color: white;">Nuestra Ubicación</h4>
                    </center>
                </b>
                <iframe id="map"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.9257994164057!2d-76.52583988464063!3d3.4511708976337547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a8b0a333d68d%3A0xebda6e9fe3f0e6d4!2sCl.%2052%20%233-80%2C%20Cali%2C%20Valle%20del%20Cauca!5e0!3m2!1sen!2sco!4v1650902596097!5m2!1sen!2sco&t=satellite&layer=m"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div id="divcopyright" class="text-center p-3" class="modovertical">
            <p style="color: white;"><b>© 2023 - TODOS LOS DERECHOS RESERVADOS</b></p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>