{{-- jaider --}}
@extends('layouts.contenedor')
@section('title','perfil')
@section('component')
<section class="section mb-5">
<div class="m-2">
    <div class="">
        <div class="">
            <div class="fs-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                </svg>
                Hola {{ Auth::user()->first_name }}
            </div>
            <section style="display: flex;">
                <div style="width: 300px;">
                    <a href="{{route('users.show',Auth::user()->id)}}">
                        <div class="form-control mb-2">
                            <p>Datos personales</p>
                        </div>
                    </a>
                    <a href="{{route('direcciones.index')}}">
                        <div class="form-control mb-2">
                            <p>Direcciones</p>
                        </div>
                    </a>
                    <a href="">
                        <div class="form-control mb-2">
                            <p>Cambiar contraseña</p>
                        </div>
                    </a>
                    <a href="">
                        <div class="form-control mb-2">
                            <p>Mis compras</p>
                        </div>
                    </a>
                    <a href="{{route('logout')}}">
                        <div class="form-control mb-2">
                            <p>Cerrar sesion</p>
                        </div>
                    </a>

                </div>
                <div class="px-5" style="width: 100%;">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
</div>
</section>
@endsection
