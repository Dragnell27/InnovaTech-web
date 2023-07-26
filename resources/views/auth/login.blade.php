@extends('layouts.contenedor')

@section('title', 'Inicio Sesion')

@section('component')
    <link rel="stylesheet" href="{{ asset('css/inicioSesion.css') }}">


    <div id="login-form-container" class="login-form-container">
        <h2 id="titulo">Iniciar Sesión</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="Email"></label>
                <input type="text" id="email" name="email" placeholder="Correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="Contraseña"></label>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
                <div><b><a href="#" class="gradient-text  mb-3">Restablecer contraseña</a></b></div>

                <p><input class="my-button2 mt-3" type="submit" value="Iniciar Sesion"></p>
                <hr color="black">
                <b>
                    <p id="titulo">¿No tienes cuenta? <a href="{{ route('register') }}">Registrate</a></p>
                </b>
        </form>
    </div>

@endsection
