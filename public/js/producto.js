function myFunction(smallImg){
    var fullImg=document.getElementById("imgBox")
fullImg.src=smallImg.src;
}
//Camilo Alzate Aqui se ha Consumido el API de Productos
window.addEventListener('load',async()=>{
var productID=1;
try {
    const response =await fetch("http://localhost/proyecto_web/public/api/products/"+productID);
    const data = await response.json();
    const producto=data.data[0];
    document.getElementById("name").textContent = producto.name;
    document.getElementById("desc").textContent= producto.desc;
    document.getElementById("price").textContent= '$'+producto.price;
    document.getElementById("color").textContent= producto.colors;
    document.getElementById("imgBox").src= producto.images
    document.getElementById("imageOne").src= producto.images;
    document.getElementById("imageTwo").src= producto.images;
    document.getElementById("imageThree").src= producto.images;
    document.getElementById("imagefour").src= producto.images;
 
} catch (error) {
    console.error('Error al obtener los datos del producto');
}
})

const allStars = document.querySelectorAll(".star");

allStars.forEach((star, i) => {
    star.onclick = function () {
        let current_star_level = i + 1;
        
        allStars.forEach((star, j) => {
            
            console.log(j + 1);
            if (current_star_level >= j + 1) {
                star.innerHTML = '&#9733';
            } else {
                star.innerHTML = '&#9734';
            }
        })
    }
})
