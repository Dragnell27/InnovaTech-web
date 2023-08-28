
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
    createOrder: function(data,actions){
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
            windows.location.href="";
        });
    },
}).render('#paypal-button-container');
