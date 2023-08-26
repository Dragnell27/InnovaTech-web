@extends('layouts.contenedor')
@section('title','Categorias')
<head>
    <title>Acerca de Nosotros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/help.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<div>
    <div id= "margin"><h1> Como podemos ayudarte</h1></div>

    <div class="container mb-5" id= "margin-t">
    <div class="botones-columna">

        <!--"Iniciar Sesión-Regitrarse" -->
        <button class="desplegable" onclick="toggleDesplegable('iniciar-sesion')"><span class="simbolo">•</span>Iniciar Sesión-Registro</button>
        <div id="iniciar-sesion" class="contenido-desplegable">
            <h2 class="text-dark">Cómo Iniciar Sesión y registrarse</h2>
            <p>Para iniciar sesión y registrarse en nuestro sitio web, sigue estos pasos:</p>
            <ol>
                <li>En la parte superior encontraras inicio de sesión.</li>
                <li>Ingresa nombre de usuario y contraseña si desea iniciar sesion.</li>
                <li>Si desea registarse en la parte inferior encontraras (¿No tienes cuenta? Registrate).</li>
                <li>Llena nuestro formulario y disfruta de nuestros servicios.</li>
            </ol>
        </div>

            <!--"Comprar un Producto" -->
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

            <!--"Contacto" -->
            <button class="desplegable" onclick="toggleDesplegable('contacto')"><span class="simbolo">•</span>Cómo Comprar un Producto</button>
            <div id="contacto" class="contenido-desplegable">
                <h2 class="text-dark">Mas dudas</h2>
                <p>Si necesitas mas asesorias:</p>
                <ol>
                    <li>Busca el icono de contacto</li>
                    <li></li>
                    <li></li>
                </ol>
            </div>


        </div>
    </div>
</div>

    @include('layouts.footer')

    <script src="{{ asset('js/help.js') }}"></script>
</body>