async function compra() {
    // try {
    //     const response =await fetch("http://localhost/proyecto_web/public/api/products");
    //     const data = await response.json();
    //     data.forEach((producto)=>{
    //     console.log(producto);

    //     document.getElementById("imgP").src=producto.images;
    //     document.getElementById("name").textContent=producto.name;

    // });
    // } catch (error) {
    //     console.error('Error al obtener los datos del producto');
    // }
}

async function user() {
    try {
        if (!url) {
            console.error('el usuario no esta registrado');
            return;
        }
        const response = await fetch(url);
        if (response.ok) {
            const data = await response.json();
            const user=data.data[0];
            document.getElementById('firstName').value=user.first_name;
            document.getElementById('lastName').value=user.last_name;

            console.log(user);
        }else{
        console.error('Error al obtner los datatos del usuario');

        }
    } catch (error) {
        console.error('Error', error);
    }
}

window.addEventListener('load', async () => {
    await compra();
    await user();
});





