// console.log(jsVariable);

// var pagar = document.getElementById("pagar");
// var total = (jsVariable)*100;
// pagar.value = total;

// var letras = "ABCDEFGHIJKLMNOPQRSTUVWZabcdefghijklmnopqrstuvwxyz123456789";
// referencia = '';

// for(let i =0; i<12; i++){
//     const generador = Math.floor(Math.random()*letras.length);
//     referencia += letras.charAt(generador);
// }
// var rfe = document.getElementById("reference");
// rfe.value = referencia;


// var cadenaConcatenada = referencia+total+"COPtest_integrity_xh3X1tevWpLr1SgvMeWgAbgZupELw3wB";
// var firma = document.getElementById("firma");
// firma.value = cadenaConcatenada;

window.addEventListener("load",()=>{
    console.log(jsVariable);
    const key = "9558aeb5f1e4e4b45a976b89a61c3fda62da04c1";
    const url =  `https://api.getgeoapi.com/v2/currency/convert?api_key=${key}&from=COP&to=USD&amount=393740&format=json`;

    fetch(url)
    .then(response => response.json())
    .then(data =>{
        jsVariable = data.rates.USD.rate_for_amount;
        console.log(Math.ceil(jsVariable));

    })


})

paypal.Buttons({
    style:{
        color: 'blue',
        label: 'pay'
    },
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: Math.ceil(jsVariable)
                }
            }]
        });
    },

    onApprove: function(data, actions){
        actions.order.capture().then(function(detalles){
            console.log(detalles);
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Compra exitosa',
                confirmButton :"Ver factura",
                showConfirmButton:true,
              }).then((result )=>{
                if(result.isConfirmed){
                    const modal=$('.modal');
                    modal.addClass('modal--openModal');
                    $('#factura').show();
                    fetch('api/bill/'+id)
                    .then(response =>{
                        if(response.ok){
                            console.log("Cambiado correctamente");
                        }else{
                            console.log("No se pudo cambiar, codigo de estado:" + response.status);
                        }
                    })
                }
              })

        });
    },
}).render('#paypal-button-container');
