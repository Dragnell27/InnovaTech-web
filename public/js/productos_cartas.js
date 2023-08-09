window.addEventListener("load", async () => {
    try {
        const response = await fetch(
            "http://localhost/proyecto_web/public/api/products"
        );
        const data = await response.json();
        const producto = data;

        document.getElementById("name").textContent = producto.name;
        document.getElementById("desc").textContent = producto.description;
        document.getElementById("price").textContent = "$" + producto.price;
        document.getElementById("color").textContent = producto.colors;
        document.getElementById("imgCard").src= producto.images

        const images = producto.images.split(';'); // Separar las URLs usando el delimitador
        const imgCard = document.getElementById("imgCard");

        if (images.length > 0) {
            imgCard.src = images[0]; // Mostrar la primera imagen por defecto

        //     let currentImageIndex = 0;

        //     setInterval(() => {
        //         currentImageIndex = (currentImageIndex + 1) % images.length;
        //         imgBox.src = images[currentImageIndex];
        //     }, 3000); // Cambiar la imagen cada 3 segundos (ajusta el valor según lo que desees)
        }
    } catch (error) {
        console.error("Error al obtener los datos del producto");
    }
});
