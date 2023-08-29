
window.addEventListener("load",()=>{
    console.log(jsVariable);
    const key = "9558aeb5f1e4e4b45a976b89a61c3fda62da04c1";
    const url =  `https://api.getgeoapi.com/v2/currency/convert?api_key=${key}&from=COP&to=USD&amount=${jsVariable}&format=json`;

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
    onApprove: function(data, actions) {
        return fetch('/paypal/process/' + data.orderID)
        .then(res => res.json())
        .then(function(orderData) {
            var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

            if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                return actions.restart();
            }

            if (errorDetail) {
                var msg = 'Sorry, your transaction could not be processed.';
                if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                return alert(msg);
            }
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            var transaction = orderData.purchase_units[0].payments.captures[0];
            alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
        });
    },
}).render('#paypal-button-container');
