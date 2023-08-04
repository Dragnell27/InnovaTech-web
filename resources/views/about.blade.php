
    @extends('layouts.contenedor')
@section('title','Categorias')
<head>
    <title>Acerca de Nosotros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    
</head>
    <div >
    <!-- Barra de navegación -->
    <nav id="navbar-navegacion" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container"> <!-- Añadimos un contenedor para centrar los botones en la barra de navegación -->
            <a class="navbar-brand" href="#about-section" >Acerca de Nosotros</a>
            <button id="custom-navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about-section" onclick="closeNavbar()">Acerca de nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section-mision" onclick="closeNavbar()">Nuestra Misión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section-historia" onclick="closeNavbar()">Nuestra Historia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section-equipo" onclick="closeNavbar()">Nuestro Equipo</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a class="nav-link" href="#section-vision" onclick="closeNavbar()">Nuestra Visión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est pariatur, ipsam nesciunt deleniti doloremque id ad laborum magni quam quae alias dolore aliquam nihil quia reprehenderit. Quos quis, quaerat facilis distinctio ipsum corrupti aspernatur quo, pariatur esse ea at temporibus! A beatae ab nemo nostrum culpa sit earum ea animi adipisci ipsam doloribus similique, rerum commodi voluptate nobis obcaecati illo sapiente reprehenderit. Consectetur aliquid ea ex suscipit accusamus in fuga optio architecto cupiditate nobis maiores quasi, voluptas incidunt laboriosam asperiores consequuntur dolorum adipisci facere nulla vero. Eius quis nulla, quae nisi ipsa assumenda sed debitis. Explicabo reiciendis quasi veniam cum iste accusantium amet dignissimos officia nostrum molestias suscipit ex ea magnam non dolor optio nisi iure sit, dicta neque, ipsam quae. Laboriosam exercitationem ipsa iste sapiente quis, dignissimos magni corporis reiciendis earum cum minima quod beatae quasi voluptates illum praesentium voluptatum sequi a dolore odit ex. Quasi suscipit cupiditate iste a quam. Voluptate quam ut placeat magnam, voluptatibus corporis alias harum rem quis fugiat ratione laudantium ipsam officia eaque quidem, consectetur rerum minus! Porro molestias id, neque consequatur ipsam, at quas cumque eligendi sunt totam a animi fuga deserunt delectus quod veritatis excepturi eum similique sequi, ut exercitationem adipisci atque.</p>
                </section>

                <section id="section-historia" class="section-about">
                    <h2 class="text-dark">Nuestra Historia</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de la Historia" class="img-fluid mb-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum aliquam numquam quos iusto placeat minima consectetur qui tempore est laudantium nobis aperiam excepturi eos expedita, recusandae molestias, magnam, dolorum dolore omnis voluptates. Soluta itaque quibusdam impedit nisi iusto nam fugiat, maxime eius consequatur delectus tenetur obcaecati excepturi, cupiditate perspiciatis iure possimus deserunt ex voluptas voluptatem magni fugit tempore officiis placeat dicta. Officia, corporis tenetur rerum facere reiciendis nisi asperiores ratione earum, atque ipsam vitae dolore optio magnam? Porro soluta atque inventore doloremque veniam, illum ut! Quis fugiat consequuntur eos vero facilis culpa? Eum, voluptas? Aut, ab? Doloribus voluptas ut delectus.</p>
                </section>

                <section id="section-equipo" class="section-about">
                    <h2 class="text-dark">Nuestro Equipo</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de Nuestro Equipo" class="img-fluid mb-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, harum distinctio? Odit omnis iste repudiandae illo, eius consectetur accusamus enim sint maxime officia dolorem ab deleniti voluptatum commodi delectus sit est modi ratione quis fugiat, saepe facilis eveniet consequuntur. Ipsam earum est debitis commodi repellendus ducimus repudiandae, saepe tenetur deserunt possimus. Nisi nostrum soluta at voluptate! Nihil ullam, repellat, tempora optio tempore, repellendus officiis distinctio explicabo dolore praesentium temporibus cum recusandae consectetur rem unde voluptatum omnis. Minima iusto consequuntur totam rerum voluptas culpa esse rem libero, fuga veniam et explicabo, animi beatae soluta ducimus facere harum vero sapiente, nobis vitae fugit quia. Harum, quas voluptatem. Expedita explicabo consectetur alias possimus est sapiente recusandae esse sunt cum aperiam, quae odio amet accusantium ducimus magnam, deleniti dolorem ab, nostrum ea maiores inventore. Unde, saepe impedit. Amet corrupti modi nihil quas, ipsum repellendus ipsam minima tempora inventore dolorum. Molestias impedit aperiam nihil nam!</p>
                </section>

                <section id="section-vision" class="section-about">
                    <h2 class="text-dark">Nuestra Visión</h2>
                    <img src="{{ asset('img/mision_empresa.jpg') }}" alt="Imagen de Nuestra Visión" class="img-fluid mb-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime aliquid suscipit adipisci nemo minima eligendi soluta non et deleniti ad sint, totam explicabo consequuntur rerum optio nostrum unde. Quas, blanditiis.</p>
                </section>
            </main>
        </div>
    </div>
    </div>

    @include('layouts.footer')


</body>

</html>
