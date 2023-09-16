try {
    fetch('/api/shopping/'+id)
        .then(response => response.json())
        .then(data => {
            var contenedor = '';
            var datos;
            for (const compra in data) {
                if (data.hasOwnProperty(compra)){
                    const venta = data[compra];
                    var datos = '<div class="card mb-5"><div class="row">';
                    for (const sales of venta) {
                        var fecha = (sales.fecha).split('T')[0];
                        switch (sales.estado) {
                            case 10:
                                var estate = "Pendiente";
                                break;
                            case 11:
                                var estate = "Cancelado";
                                break;
                            case 12:
                            var estate = "Entregado";
                                break;
                            case 13:
                            var estate = "Recibido";
                                break;
                            default:
                                break;
                        }
                        switch (estate) {
                            case "Recibido":
                                var colorElement = "#36B50D";
                                break;
                            case "Entregado":
                                var colorElement = "#3364FF";
                                break;
                            case "Pendiente":
                            var colorElement = "#FF7000";
                                break;
                            case "Cancelado":
                            var colorElement = "#FF001B";
                                break;
                            default:
                                break;
                        }
                        var images = sales.imagen.split(':');
                        datos += `
                        <div class=" border-bottom col-12 row mb-2">
                        <div class="col-md-3 p-3">
                        <img src="https://innovatechcol.com.co/img/productos/${images[0]}" alt="Producto" class="img-fluid">
                        </div>

                        <div class="col-md-9 card-body p-3 justify-content-center align-items-center">
                        <h3 class="mt-4 producto">${sales.producto}</h3>
                        <font color="${colorElement}"><p class="mt-3 estado-texto">${estate} </p></font>
                        <p class="mt-2 compra">Fecha de compra: ${fecha}</p>

                    <div class="col-12 text-end p-3">
                    <a href="/productos/${sales.product_id}"> <button class="btn btn-primary">Ver producto</button></a>
                    </div></div></div>`;
                    }
                    datos+= '</div></div>';
                    contenedor+=datos;
                }
            }
            contenedor+= '';
            document.getElementById('content').innerHTML = contenedor; // Establecer el contenido HTML del elemento
        })
} catch (error) {
    console.log("No hay datos");
}
