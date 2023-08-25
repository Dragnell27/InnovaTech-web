@extends('layouts.contenedor')
@section('title','Categorias')
<head>
    <title>Acerca de Nosotros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/help.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div class="container py-5 mt-5">
        <h1>Ayudas</h1>

        <div class="botones-columna">
            <!-- Elemento "Cómo Iniciar Sesión" -->
            <button class="desplegable" onclick="toggleDesplegable('iniciar-sesion')"><span class="simbolo">•</span>Cómo Iniciar Sesión</button>
            <div id="iniciar-sesion" class="contenido-desplegable">
                <h2 class="text-dark">Cómo Iniciar Sesión</h2>
                <p>Para iniciar sesión en nuestro sitio web, sigue estos pasos:</p>
                <ol>
                    <li>Ve a la página de inicio de sesión.</li>
                    <li>Ingresa tu nombre de usuario y contraseña.</li>
                    <li>Haz clic en el botón "Iniciar Sesión".</li>
                </ol>
            </div>

            <!-- Elemento "Cómo Comprar un Producto" -->
            <button class="desplegable" onclick="toggleDesplegable('comprar-producto')"><span class="simbolo">•</span>Cómo Comprar un Producto</button>
            <div id="comprar-producto" class="contenido-desplegable">
                <h2 class="text-dark">Cómo Comprar un Producto</h2>
                <p>Para comprar un producto en nuestro sitio web, sigue estos pasos:</p>
                <ol>
                    <li>Busca el producto que deseas en nuestra tienda.</li>
                    <li>Haz clic en el producto para ver los detalles.</li>
                    <li>Agrega el producto a tu carrito de compras.</li>
                    <li>Ve a tu carrito de compras y completa la compra.</li>
                </ol>
            </div>
        </div>
    </div>


    @include('layouts.footer')

    <script src="{{ asset('js/help.js') }}"></script>
</body>