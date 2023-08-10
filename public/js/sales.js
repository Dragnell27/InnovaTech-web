document.addEventListener("DOMContentLoaded", () => {
    const salesContainer = document.getElementById("sales-container");
    fetch('api/compras')
    .then(response => response.json())
    .then(data => {
        data.foreach(sales =>{
            const salesDiv = document.createElement('div');
            salesDiv.innerHTML = document.querySelector('#producto-template').innerHTML;
            salesDiv.querySelector('.card').setAttribute('data-product-id',sales.id);

            const salesContent = salesDiv.querySelector('.card');
            salesContent.querySelector('.mt-3').textContent = sales.param_status;
            salesContent.querySelector('.mt-2').textContent = sales.create_at;

            salesContainer.appendChild(salesDiv);
        });
    })
    .catch(error => console.error('Error de producto: ',error));
});
