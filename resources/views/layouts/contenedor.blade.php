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
                <a href="{{ url('/') }}"><img src="{{ asset('img/logo-i.png') }}" id="imagen-logo"></a>
                <a id="btn-menu" onclick="toggleSidebar()"><img src="{{ asset('img/Menu.png') }}" id="menu-logo"></a>
                <div class="sidebar" style="background-color: white;" id="sidebar">
                    <a href="#"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <span class="fs-4"><img src="{{ asset('img/Logo-i.png') }}" height="50px"></span>
                    </a>
                    <ul id="sidebar-links">
                        @auth
                            <li class="links">
                                <a class="ocultar" href="{{ route('users.show', Auth::user()->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                <span>Mi cuenta</span>
                                </a>
                            </li>
                        @else
                            <li class="links"><a class="ocultar" href="{{ route('login') }}">Iniciar Sesion</a></li>
                        @endauth ()
                        <li class="links justify-content-center align-items-center">
                            <a class="ocultar" href="{{ route('wishlist.index') }}"  style="display: flex;  align-items: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                                </svg>
                                 <span class="text-center">Mi lista de deseos

                                 </span>
                            </a>
                        </li>
                        {{--  <li class="links">
                            <a class="ocultar" href="{{ route('cart.show') }}"
                                method="get">Carrito
                            </a>
                        </li>  --}}
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
                    <li class="links"><a href="{{ route('users.show', Auth::user()->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                <span>Mi cuenta</span</a></li>
                @else
                    <li class="links"><a href="{{ route('login') }}">Iniciar Sesion</a></li>
                @endauth ()
                <li  class="links"> <a href="{{ route('wishlist.index') }}">  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                </svg>
                <span>Lista de deseos</span>
                 </a></li>
                
                <li>
                    <form action="{{ Route('cart.show') }}" method="get">
                        <div id="icono">
                            <button type="submit" id="btnCarrito" class="" style="margin-top: 0 !important; height: 40px !important; width: 60px !important">
                                <img src="{{ asset('img/carro_compra.png') }}" style="margin-bottom: 6px" width="40px" height="40px"
                                    alt="">
                                <span class="" id="counter"> 
                                    @if (Auth::check())
                                        <?php $CartCount = Cart::session(Auth::user()->id)
                                            ->getContent()
                                            ->count(); ?>
                                    @else
                                        <?php $CartCount = Cart::getContent()->count(); ?>
                                    @endif
                                    {{ $CartCount }}
                                   
                                </span>
                               
                            </button>
                           
                        </div>
                    </form>
                 
                </li>
                @auth
                    <li class="links"><a href="{{ route('logout') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                          </svg>
                        <span>Cerrar sesion</span></a></li>
                @endauth ()
            </ul>

            <i class="uil search-icon " id="searchIcon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                
              </svg></i>
              <i class="uil search-icon inactive" id="search-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </i>
            <div class="search-box">
                <i class="uil search-icon" id="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </i>
                
                
                <form action="{{ route('products.search') }}" method="POST">
                    @csrf
                    <input type="text" name="query" autocomplete="off" spellcheck="false"  id="query" placeholder="Buscar en innovatech..." />
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
    {{--  <!-- Bootstrap JS -->  --}}

</body>

</html>
