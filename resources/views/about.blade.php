
    @extends('layouts.contenedor')
@section('title','Categorias')
<head>
    <title>Acerca de Nosotros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    
</head>
    <div >
    <div class="container py-5">
        <div class="row mt-4">
            <!-- Contenido de la página "Acerca de nosotros" -->
            <header class="text-center col-12">
                <h1 class="display-4 font-weight-bold mb-4">Acerca de Nosotros</h1>
            </header>

            <main class="col-12">
                <!-- Agrega el ID personalizado "about-section" a la sección "Acerca de nosotros" -->
                
                <!-- El resto de las secciones se mantienen igual, pero se agregan IDs para los enlaces de la barra de navegación -->
                <section id="section-mision" class="section-about" >
                    <h2 class="text-dark">Nuestra Misión</h2>
                    <img src="{{ asset('img/mision.jpg') }}" alt="Imagen de la Misión" class="img-fluid mb-5 ml-5" style="max-width: 700px;">
                    <h5 class="text-dark"><p>La plataforma de servicios online INNOVA-TECH, es la encargada de incrementar la productividad, efectividad y comunicación de clientes del sector de  la tecnología en Cali, Yumbo, Dosquebradas y Pasto con la micro-empresa innova tech occidente así aumentando sus ventas y servicios online  y dando oportunidad a que esta empresa pueda expandirse mucho mas.</p></h5>
                </section>

                <section id="section-historia" class="section-about">
                    <h2 class="text-dark">Nuestra Historia</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de la Historia" class="img-fluid mb-3">
                    <h5 class="text-dark"><p></p></h5>
                </section>

                <section id="section-equipo" class="section-about">
                    <h2 class="text-dark">Nuestro Equipo</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de Nuestro Equipo" class="img-fluid mb-3">
                    <h5 class="text-dark"><p></p></h5>
                </section>

                <section id="section-vision" class="section-about">
                    <h2 class="text-dark">Nuestra Visión</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de Nuestra Visión" class="img-fluid mb-3">
                    <h5 class="text-dark"><p>En 2028 la plataforma de servicios y comercio  INNOVA-TECH logrará posicionarse y permanecer como una de las principales plataformas digitales que conecte los clientes con la empresa misma a nivel nacional. Priorizando así al máximo la atención al cliente al momento de obtener productos e información de manera eficaz. Brindando así más practicidad, rapidez y seguridad al momento de automatizar los procesos necesarios en compras de productos. </p></h5>
                </section>
            </main>
        </div>
    </div>
    </div>

    @include('layouts.footer')


</body>

</html>
