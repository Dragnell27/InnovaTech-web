<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div id="CarritoCompraTitulo">
                <h3>  <i class="bi bi-cart4"></i>
                <span class="text-danger">Carrito de compras</span></h3>
        
    </div>
    {{--@if (carrito está vacio que me muestre)
        
    @else--}}
    <div class="row g-5 ">
    <div class="col-md-5 col-lg-4 order-md-last">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-danger">Resumen de compra</span>
          <small>productos <span class="badge bg-danger rounded-pill">1</span></small>
          
      </h4>
      <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                  <h6 class="my-0">Nombre de Producto</h6>
                  <small class="text-body-secondary">En esta parte va el producto y la
                      descripción</small>
              </div>
          </li>
         
          <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
              <div class="text-success">
                  <h6 class="my-0">Total (USD)</h6>
              </div>
              <span class="text-success">−$20</span>
          </li>
      </ul>
      <form class="card p-2">
          <div class="input-group">
              <a name="" id="" class=" w-100 btn btn-primary  btn-lg"
                  href="{{ route('LuEnvio') }}" role="button">Continuar compra
              </a>
          </div>
      </form>
  </div>
    <div class="col-md-4 col-lg-6  rounded" >
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                   <table class="table table-striped">
                    <tbody>
                        {{-- @foreach ( as ) --}}
                        
                          <tr>
                           
                            <td>
                                <h1>
                                    <i class="bi bi-cart4"></i>  
                                </h1>
                                <span>
                                    <button> envio rapido</button>
                                </span>
                            </td>
                            <td>
                                <span><p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit doloremque. Corporis modi, vel deserunt vero minima tempore ?
                                    </p>
                                </span> 
                            </td>
                            <td> 
                              <li class=" d-flex ">
                      
                                  <span><p>
                                    g elit doloremque. Corporis modi, vel deserunt vero minima tempore ?
                                      </p>
                                  </span>
                        
                            </li>

                          </td>
                          <td><button class="rounded-0 m-0"><i class="bi bi-plus-circle-fill"></i></button>
          <span class="badge bg-danger rounded-pill">1</span>
                            
                           <button class="rounded-0 m-0"><i class="bi bi-dash-circle-fill"></i></button></td>
                          
                          </tr>
                        {{-- @endforeach --}}
                    </tbody>
                   </table>
                </li>
            </ul> 
    </div>
    </div>

    {{-- @endif --}}
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>