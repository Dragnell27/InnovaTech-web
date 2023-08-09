<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Calificación de Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
</head>
<body>
<div class="container" id="CargarVista">
    <div class="jumbotron">
      <div class="container-fluid display-4" style="margin: 20px 0px;">
        <div class="red-div">
          <h2 style="color: white;">Estrellas de los usuarios</h2>
        </div>
      </div>
      <div class="d-flex flex-row justify-content-center align-items-center" id="contenedormetricas">
        <div class="rating" style="width: 40%;">4.5 ★</div>
        <div class="rating-container">
          <div class="rating-graph" id="contenedorgraficos">
            <div class="d-flex flex-row justify-content-center align-items-center">
              <h3 style="margin-right: 20px;">5★</h3>
              <div class="rating-graph">
                <div class="rating-bar" style="width: 90%; margin-right: 20px; background-color: #007bff;"></div>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center">
              <h3 style="margin-right: 20px;">4★</h3>
              <div class="rating-graph" class="grafico">
                <div class="rating-bar" style="width: 60%; background-color: #007bff;"></div>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center">
              <h3 style="margin-right: 20px;">3★</h3>
              <div class="rating-graph">
                <div class="rating-bar" style="width: 40%; background-color: #007bff;"></div>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center">
              <h3 style="margin-right: 20px;">2★</h3>
              <div class="rating-graph">
                <div class="rating-bar" style="width: 20%; background-color: #007bff;"></div>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center">
              <h3 style="margin-right: 25px;">1★</h3>
              <div class="rating-graph">
                <div class="rating-bar" style="width: 20%; background-color: #007bff;"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column">
          <!-- 5 Estrellas --> <h3 style="text-align: start;">1250</h3>
          <!-- 4 Estrellas --> <h3 style="text-align: start;">125</h3>
          <!-- 3 Estrellas --> <h3 style="text-align: start;">12</h3>
          <!-- 2 Estrellas --> <h3 style="text-align: start;">1</h3>
          <!-- 1 Estrella --> <h3 style="text-align: start;">2</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row" id="secciondecomentarios">
    <div class="col-md-8 offset-md-2">
      <div class="container-fluid" style="margin: 20px 0px;">
        <div class="red-div">
          <h2 style="color: white;">Comentarios De Los Usuarios</h2>
        </div>
      </div>
      <div class="container-fluid d-flex flex-row justify-content-center align-items-center">
        <div style="margin-bottom: 30px;">
          <button type="button" class="btn btn-danger text-white">Más Reciente</button>
          <button type="button" class="btn btn-danger text-white">Mayor Calificación</button>
          <button type="button" class="btn btn-danger text-white">Menor Calificación</button>
        </div>
      </div>
      <div class="comments">
        <div class="comment">
          <p class="fechacomentario">21/05/2023</p>
          <h4>Rodrigo Arango</h4>
          <p><i style= "color: yellow;">★★★★★</i></p>
          <p>¡Me encanta este producto! Es de alta calidad y vale cada centavo.</p>
        </div>
        <div class="comment">
          <p class="fechacomentario">21/05/2023</p>
          <h4>Rodrigo Arango</h4>
          <p><i style= "color: yellow;">★★★★★</i></p>
          <p>¡Me encanta este producto! Es de alta calidad y vale cada centavo.</p>
        </div>
        <div class="comment">
          <p class="fechacomentario">21/05/2023</p>
          <h4>Rodrigo Arango</h4>
          <p><i style= "color: yellow;">★★★★★</i></p>
          <p>¡Me encanta este producto! Es de alta calidad y vale cada centavo.</p>
        </div>
        <div class="comment">
          <p class="fechacomentario">21/05/2023</p>
          <h4>Rodrigo Arango</h4>
          <p><i style= "color: yellow;">★★★★★</i></p>
          <p>¡Me encanta este producto! Es de alta calidad y vale cada centavo.</p>
        </div>
        <div class="comment">
          <p class="fechacomentario">21/05/2023</p>
          <h4>Rodrigo Arango</h4>
          <p><i style= "color: yellow;">★★★★★</i></p>
          <p>¡Me encanta este producto! Es de alta calidad y vale cada centavo.</p>
        </div>
        <div class="comment">
          <p class="fechacomentario">21/05/2023</p>
          <h4>Rodrigo Arango</h4>
          <p><i style= "color: yellow;">★★★★★</i></p>
          <p>¡Me encanta este producto! Es de alta calidad y vale cada centavo.</p>
        </div>
      </div>
    </div>
    </div>
    <script src="{{ asset('js/producto.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
