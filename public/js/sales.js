try {
    fetch('/api/shopping/'+id)
        .then(response => response.json())
        .then(data => {
            var contenedor = '';
            var datos;
            for (const compra in data) {
                if (data.hasOwnProperty(compra)){
                    const venta = data[compra];
                    var datos = '<div class="card mb-2"><div class="row">';
                    for (const sales of venta) {
                        console.log(sales);
                        var fecha = (sales.fecha).split('T')[0];
                        var images = sales.imagen.split(':');
                        datos += `
                        <div class=" border-bottom col-12 row mb-2">
                        <div class="col-md-3">
                        <img src="https://innovatechcol.com.co/img/productos/${images[0]}" alt="Producto" class="img-fluid">
                        </div>

                        <div class="col-md-9 card-body>
                        <h3 class="mt-4">${sales.producto}</h3>
                        <p class="mt-3">Estado:${sales.estado} </p>
                        <p class="mt-2">Fecha de compra: ${fecha}</p>

                    <div class="col-12 text-end p-3">
                      <a href="show_product "> <button class="btn btn-primary">Ver producto</button></a>
                    </div></div></div>`;
                    }
                    datos+= '</div></div>';
                    contenedor+=datos;
                }
            }
            contenedor+= '';
            document.getElementById('content').innerHTML = contenedor; // Establecer el contenido HTML del elemento

            console.log(data);
        })
} catch (error) {
    console.log("No hay datos");
}
