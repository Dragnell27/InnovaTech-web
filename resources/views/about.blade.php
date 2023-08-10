
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
                    <img src="{{ asset('img/mision.jpg') }}" alt="Imagen de la Misión" class="img-fluid mb-3">
                    <p></p>
                </section>

                <section id="section-historia" class="section-about">
                    <h2 class="text-dark">Nuestra Historia</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de la Historia" class="img-fluid mb-3">
                    <p></p>
                </section>

                <section id="section-equipo" class="section-about">
                    <h2 class="text-dark">Nuestro Equipo</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de Nuestro Equipo" class="img-fluid mb-3">
                    <p></p>
                </section>

                <section id="section-vision" class="section-about">
                    <h2 class="text-dark">Nuestra Visión</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de Nuestra Visión" class="img-fluid mb-3">
                    <p></p>
                </section>
            </main>
        </div>
    </div>
    </div>

    @include('layouts.footer')


</body>

</html>
