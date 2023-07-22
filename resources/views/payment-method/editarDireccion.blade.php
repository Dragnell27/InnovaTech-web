<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <form class="form">
        <h2 class="form_titulo">Ingresa tu direccion</h2>
        <p class="form_parrafo">para ver las opciones de <strong>entrega</strong> y <strong>retiro</strong> </p>
        
        <div class="form_container">    
                    <div class="form_group">
                           
                            <select name="departamento" id="departamento" class="form_input border-dark">
                                <option value="">Selecciona un departamento</option>
                                <option value="Amazonas">Amazonas</option>
                                <option value="Antioquia">Antioquia</option>
                                <option value="Arauca">Arauca</option>
                                <option value="Atlantico">Atlantico</option>
                                <option value="Bogota">Bogota</option>
                                <option value="Bolivar">Bolivar</option>
                                <option value="Boyaca">Boyaca</option>
                                <option value="Caldas">Caldas</option>
                                <option value="Caqueta">Caqueta</option>
                                <option value="casanare">casanare</option>
                                <option value="Cauca">Cauca</option>
                                <option value="Cesar">Cesar</option>
                                <option value="Choco">Choco</option>
                                <option value="Cordoba">Cordoba</option>
                                <option value="Monteria">Monteria</option>
                                <option value="Cundinamarca">Cundinamarca</option>
                                <option value="Guainía">Guainía</option>
                                <option value="Guaviare">Guaviare</option>
                                <option value="Huila">Huila</option>
                                <option value="La Guajira">La Guajira</option>
                                <option value="Magdalena">Magdalena</option>
                                <option value="Meta">Meta</option>
                                <option value="Nariño">Nariño</option>
                                <option value="Norte de Santander">Norte de Santander</option>
                                <option value="Putumayo">Putumayo</option>
                                <option value="Quindío">Quindío</option>
                                <option value="Risaralda">Risaralda</option>
                                <option value="San Andrés y Providencia">San Andrés y Providencia</option>
                                <option value="Santander">Santander</option>
                                <option value="Sucre">Sucre</option>
                                <option value="Tolima">Tolima</option>
                                <option value="Valle del Cauca">Valle del Cauca</option>
                                <option value="Vaupés">Vaupés</option>
                                <option value="Vichada">Vichada</option>
                                <option value="Montería">Montería</option>
                            </select>
           
                        </div>
                                
                                <div class="form_group">
                                   
                                    <select name="departamento" id="departamento" class="form_input border-dark">
                                        <option value="">Seleccione una ciudad</option>
                                        <option value="">Cali</option>
                                        <option>Bogota</option>
                                        <option>Medellin</option>
                                        <option>Cartagena</option>
                                        <option>Barranquilla</option>
                                    </select>
                                    <span class="form_line"></span>
                                </div>
                                   
                                <div class="form_group">
                                        <input type="text" id="Direccion" class="form_input" placeholder=" ">
                                        <label for="direction" class="form_label">Direccion:</label>
                                        <span class="form_line"></span>
        
                                    </div>
                                    
                                    <div class="form_group">
                                        <input type="text" id="lugar" class="form_input" placeholder=" ">
                                        <label for="place" class="form_label">Torre/ Apartamento/ Conjunto/ Oficina/ Condominio:</label>
                                        <span class="form_line"></span>
        
                                    </div>  
                              <a name="" id="" class="form_submit"
                                            href="{{ route('pasoUno') }}" role="button">Continuar
                                        </a>                          
        </div>
        
        
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>
</html>