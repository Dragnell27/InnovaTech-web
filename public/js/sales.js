async function identidad() {
    try {
        const response = await fetch("/api/sale");
        const data = await response.json();
        data.forEach((sales) => {
            id = sales.id;
        });
        return id;

    } catch (error) {
        console.error(error, "Error de compra");
    }
}

async function compra() {
    const id = await identidad();
    const response = await fetch("/api/shopping/"+id);
    const data = await response.json();
    console.log(data);
}

window.addEventListener("load", async ()=> {

    await compra();

});

//    fetch('/api/sale')
//     .then(response => response.json())
//     .then(data1 =>{
//         data1.forEach(shopping => {
//         const compraDiv = document.createElement('div');
//            id = shopping.id;
//            console.log(id);
//         fetch('/api/shopping/'+id)
//         .then(response => response.json())
//         .then(data2 =>{
//             console.log(data2);
//             data2.forEach(sales =>{
//             let element = document.querySelector('#content');
//             var fecha = (sales.created_at).split('T')[0];
//             // var images = (sales.images).split(":");
//             switch (sales.param_status) {
//                 case 10:
//                     var estado = 'Pendiente';
//                     break;
//                 case 11:
//                     var estado = 'Cancelado';
//                     break;
//                 case 12:
//                     var estado = 'Entregado';
//                     break;
//                 case 13:
//                     var estado = 'Recibido';
//                     break;
//                 default:
//                     break;
//             }
//             const col =document.createElement('div');
//             const md = document.createElement('div');
//             const lm = document.createElement('div');
//             col.style.marginTop="10px";
//             col.classList ='col-md-3 card'
//             col.innerHTML +=`<!-- Imagen del producto -->
//             <img src="C:/Users/jhona/Pictures/imagenes/xiaomi.jpeg" alt="Producto" class="img-fluid">`
//             element.appendChild(col)
//             md.classList = 'col-md-6'
//             md.innerHTML += `<!-- Nombre del producto -->
//             <h3 class="mt-4">${sales.name}</h3>
//             <!-- Estado del producto -->
//             <p class="mt-3" >Estado: ${estado}</p>
//             <!-- Fecha de compra -->
//             <p class="mt-2">Fecha de compra: ${fecha}</p>`
//             element.appendChild(md)
//             lm.classList = 'col-md-3 d-flex'
//             lm.innerHTML += ` <!-- Botón Buy again centrado -->
//             <a href="{{route('productos')}}"> <button class="btn btn-primary">Ver producto</button></a>`
//             element.appendChild(lm)
//             console.log(data2)
//         })
//     })
//         })
//         // console.log(data1)
//     })
//     .catch(err=>console.log('Error de muestra de productos'))
