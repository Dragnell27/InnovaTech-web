{{-- jaider --}}

<head>
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
</head>
@extends('layouts.contenedor')
@section('title', 'perfil')
@section('component')
    <div class="m-2">
        <div class="fs-2 mb-3 ms-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person"
                viewBox="0 0 16 16">
                <path
                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
            </svg>
            Hola {{ Auth::user()->first_name }}
        </div>
        <button id="toggleBlock" class="btn text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                <path
                    d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z" />
            </svg>
        </button>
        <div>
            <div style="width: 300px;" class="menu-container" id="menu">
                <button id="toggleNone" class="btn text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
                    </svg>
                </button>
                <a href="{{ route('users.show', Auth::user()->id) }}" class="mt-5">
                    <div class="form-control mb-2">
                        <p>Datos personales</p>
                    </div>
                </a>
                <a href="{{ route('direcciones.index') }}">
                    <div class="form-control mb-2">
                        <p>Direcciones</p>
                    </div>
                </a>
                <a href="{{ route('cambiar_contrasena') }}">
                    <div class="form-control mb-2">
                        <p>Cambiar contraseña</p>
                    </div>
                </a>
                <a href="{{ route('shopping', Auth::user()->id) }}">
                    <div class="form-control mb-2">
                        <p>Mis compras</p>
                    </div>
                </a>
                <a href="{{ route('logout') }}">
                    <div class="form-control mb-2">
                        <p>Cerrar sesion</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="px-5 main-container" style="width: 100%;">
            @yield('content')
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script>
        $(document).ready(function() {
            const toggleBlock = $("#toggleBlock");
            const toggleNone = $("#toggleNone");
            const menu = $("#menu");
            $(document).on("click", function(event) {
                if (!menu.is(event.target) && menu.is(":visible")) {
                    menu.hide();
                }
            });
            toggleBlock.on("click", function(event) {
                event.stopPropagation();
                menu.show();
            });
            toggleNone.on("click", function() {
                menu.hide();
            });
        });
    </script>
@endsection
