// Obtener categorías
fetch('api/category') // Asegúrate de que esta ruta sea correcta
  .then(response => response.json())
  .then(data => {
    console.log("Datos obtenidos de la API:", data); // Agrega esta línea para verificar la respuesta
    mostrarCategoriasEnVista(data.data);
  })


// Resto del código...

// Muestra las categorías
function mostrarCategoriasEnVista(categories) {
  const categoriasContainer = document.getElementById('categorias-container');
  categories.forEach(category => {
    const elemento = document.createElement('p');
    elemento.textContent = category.name;
    categoriasContainer.appendChild(elemento);

    // Agregar evento clic para cargar productos al hacer clic en una categoría
    elemento.addEventListener('click', () => cargarProductos(category.id));
  });
}

function mostrarProductosEnVista(products) {
  const productosContainer = document.getElementById('productos-container');
  productosContainer.innerHTML = ''; // Limpiar contenido anterior

  products.forEach(product => {
    const elemento = document.createElement('p');
    elemento.textContent = product.nombre;
    productosContainer.appendChild(elemento);
  });
}

function cargarProductos(categoryId) {
  fetch(`api/category/${categoryId}`)
    .then(response => response.json())
    .then(products => {
      mostrarProductosEnVista(products.data);
    })

}

// Sidebar
fetch('api/category')
  .then(response => response.json())
  .then(categories => {
    const sidebar = document.getElementById('sidebar');
    categories.data.forEach(category => {
      const link = document.createElement('a');
      link.classList.add('nav-link');
      link.href = `api/category/${category.id}`; // Ruta para mostrar productos de la categoría
      link.textContent = category.name;
      sidebar.appendChild(link);
    });
  })


  function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("active");
}

