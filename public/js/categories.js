// Sidebar
document.addEventListener('DOMContentLoaded', function() {


  const sidebar = document.getElementById('sidebar');
  const categoriesContainer = document.getElementById('categorySidebar');
  
  
  
  fetch('/api/category') // Cambia la URL de la API según tu configuración
      .then(response => response.json())
      .then(categories => {
          categories.data.forEach(category => {
              const link = document.createElement('a');
              link.classList.add('nav-link');
              link.href = `category/${category.id}`;
              link.textContent = category.name;

              link.addEventListener('click', function(event) {
                  event.preventDefault();
                  const categoryId = category.id;

                  // Redirige al usuario a la URL de la vista de productos de categoría
                  window.location.href = `/api/category/${categoryId}`;
              });

              categoriesContainer.appendChild(link);
          });
          
      });
      
});

