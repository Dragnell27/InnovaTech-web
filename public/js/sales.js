
    fetch('/api/shopping')
    .then(response => response.json())
    .then(data =>{
        data.forEach(sales =>{
            let element = document.querySelector('#content');
            var fecha = (sales.created_at).split('T')[0];
            switch (sales.param_status) {
                case 10:
                    var estado = 'Pendiente';
                    break;
                case 11:
                    var estado = 'Cancelado';
                    break;
                case 12:
                    var estado = 'Entregado';
                    break;
                case 13:
                    var estado = 'Recibido';
                    break;
                default:
                    break;
            }
            const col =document.createElement('div');
            const md = document.createElement('div');
            const lm = document.createElement('div');
            col.style.marginTop="10px";
            col.classList ='col-md-3 card'
            col.innerHTML +=`<!-- Imagen del producto -->
            <img src="{{ asset('img/Logo-Innova.jpeg') }}" alt="Producto" class="img-fluid">`
            element.appendChild(col)
            md.classList = 'col-md-6'
            md.innerHTML += `<!-- Nombre del producto -->
            <h3 class="mt-4">${sales.name}</h3>
            <!-- Estado del producto -->
            <p class="mt-3" >Estado: ${estado}</p>
            <!-- Fecha de compra -->
            <p class="mt-2">Fecha de compra: ${fecha}</p>`
            element.appendChild(md)
            lm.classList = 'col-md-3 d-flex'
            lm.innerHTML += ` <!-- Botón Buy again centrado -->
            <a href="show_product "> <button class="btn btn-primary">Ver producto</button></a>`
            element.appendChild(lm)
        })
        console.log(data)
    })
    .catch(err=>console.log('Error de muestra de productos'))

async function Productos(){
    try{
        const response = await fetch('/api/products');
        const data = await response.json()
    console.log(data);
    }catch(error){
        console.error(`Error al obtener datos ${error}`);
        return null;
    }

}
window.addEventListener('load', async () => {

   await Productos();

   });


