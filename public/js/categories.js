// Sidebar
document.addEventListener('DOMContentLoaded', function() {


  const sidebar = document.getElementById('sidebar');
  const categoriesContainer = document.getElementById('categorySidebar');
  
  
  
  fetch('/api/category') 
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

                  
                  window.location.href = `/api/category/${categoryId}`;
              });

              categoriesContainer.appendChild(link);
          });
          
      });
      
});

