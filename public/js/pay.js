

// const okFactura = $('#okPfisico');
// const modal = $('.modal');
// const cerrar = $('.btnCerrar');
// okFactura.click(function (e) {
//     modal.addClass('modal--openModal');
//     $('#factura').show();
//     modal.on('click', function (event) {
//         if ($(event.target).hasClass('modal')) {
//             modal.removeClass('modal--openModal');

//         }
//         event.stopPropagation();
//     });
//     cerrar.on('click', function (event) {
//         modal.removeClass('modal--openModal');

//         event.preventDefault();
//     });
// });







//Pagos on paypal

// window.addEventListener("load",()=>{
//     console.log(jsVariable);
//     const key = "9558aeb5f1e4e4b45a976b89a61c3fda62da04c1";
//     const url =  `https://api.getgeoapi.com/v2/currency/convert?api_key=${key}&from=COP&to=USD&amount=393740&format=json`;

//     fetch(url)
//     .then(response => response.json())
//     .then(data =>{
//         jsVariable = data.rates.USD.rate_for_amount;
//         console.log(Math.ceil(jsVariable));

//     })


// })

// paypal.Buttons({
//     style:{
//         color: 'blue',
//         label: 'pay'
//     },
//     createOrder: function(data, actions) {
//         return actions.order.create({
//             purchase_units: [{
//                 amount: {
//                     value: Math.ceil(jsVariable)
//                 }
//             }]
//         });
//     },

//     onApprove: function(data, actions){
//         actions.order.capture().then(function(detalles){
//             console.log(detalles);
//             Swal.fire({
//                 position: 'center',
//                 icon: 'success',
//                 title: 'Compra exitosa',
//                 confirmButton :"Ver factura",
//                 showConfirmButton:true,
//               }).then((result )=>{
//                 if(result.isConfirmed){
//                     const modal=$('.modal');
//                     modal.addClass('modal--openModal');
//                     $('#factura').show();
//                     const bill2= BasUrl +"/api/bill/"+id;
//                     $.ajax({
//                         method:'patch',
//                         url:bill2,
//                         data:{
//                             _token: token
//                         },
//                         success:function (response){
//                             window.location.href='/';
//                         },
//                         error:function(xhr, status, error){
//                             console.error('Error al comprar:', error);
//                             window.location.reload();
//                         }
//                     });
//                 }
//               })

//         });
//     },
// }).render('#paypal-button-container');
