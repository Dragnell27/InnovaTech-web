fetch('http://localhost/proyecto_web/public/api/compras')
  .then(response => response.json())
  .then(data => {
    console.log(data);
  })