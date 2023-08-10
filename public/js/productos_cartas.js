window.addEventListener("load", async () => {
    try {
        const productId = 1; // Supongamos que quieres obtener los datos del producto con ID 1
        const response = await fetch(
            `http://localhost/proyecto_web/public/api/products/${productId}`
        );
        const data = await response.json();
        const producto = data;

        document.getElementById("name").textContent = producto.name;
        document.getElementById("desc").textContent = producto.description;
        document.getElementById("price").textContent = "$" + producto.price;
        document.getElementById("color").textContent = producto.colors;
        document.getElementById("imgCard").src = producto.images;

        const images = producto.images.split(';'); // Separar las URLs usando el delimitador
        const imgCard = document.getElementById("imgCard");

        if (images.length > 0) {
            imgCard.src = images[0]; // Mostrar la primera imagen por defecto
        }
    } catch (error) {
        console.error("Error al obtener los datos del producto");
    }
});
