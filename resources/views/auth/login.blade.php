@extends('layouts.contenedor')

@section('title', 'Inicio Sesion')

@section('component')
<link rel="stylesheet" href="{{asset('css/inicioSesion.css')}}">


<div id="login-form-container" class="login-form-container">
    <h2 id="titulo">Iniciar Sesion</h2>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Email"></label>
            <input type="text" id="email" name="email" placeholder="Correo electrónico" required>
            <div class="input-link"><a href="#" class="gradient-text">¿Olvidaste tu Email?</a></div>
        </div>
        <div class="form-group">
            <label for="Contraseña"></label>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>
            <div class="input-link"><a href="#" class="gradient-text">¿Olvidaste tu contraseña?</a></div>
        </div>
        <p>
            <input class="my-button1" type="submit" value="Iniciar Sesion">
        </p>
        <button class="my-button2" id="Google">
            <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48' width='24' height='24'><path fill='%234285f4' d='M45.35 24.42c0-1.33-.12-2.62-.35-3.88H24v7.34h12.81c-.53 2.79-2.29 5.14-4.81 6.62v5.48h7.81c4.58-4.21 7.23-10.39 7.23-17.56z'/><path fill='%2334a853' d='M24 46c6.54 0 12.06-2.14 16.09-5.81l-7.81-5.48c-2.14 1.44-4.88 2.29-8.28 2.29-6.34 0-11.72-4.28-13.63-10.06H2.58v6.31C6.55 41.05 14.38 46 24 46z'/><path fill='%23fbbc05' d='M10.37 28.06c-.19-.58-.29-1.19-.29-1.82s.1-1.24.29-1.82V18.9H2.58a23.95 23.95 0 0 0 0 10.2l7.79-5.48z'/><path fill='%23ea4335' d='M24 7.38c2.88 0 5.47.98 7.53 2.91l5.63-5.63C36.05 1.96 30.53 0 24 0 14.38 0 6.55 4.95 2.58 11.69l7.79 5.48c1.91-5.78 7.29-9.79 13.63-9.79z'/><path fill='none' d='M0 0h48v48H0z'/></svg>"
                alt="Google Logo">
            Iniciar sesión con Google
        </button>
    </form>
</div>

@endsection