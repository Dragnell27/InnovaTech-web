$(document).ready(function(){
//Alerta del carrito 
$(".changeQuantity").click(function (e) {

    e.preventDefault();
    let operator  = e.target.value;
    switch (operator) {
        case "+":



            let qty  = $("#qty").val();
            Number(qty)

            if (qty<20) {
                $("#qty").val(Number(qty)+1);

                var prod_id = $("#hidden").val();
                var quantity = $("#qty").val();
                var fixedPrice  = $("#ProductPrice").val();
                var updatePrice = Number(fixedPrice)*Number(quantity) ;
                $("#priceP").html(updatePrice);
                
              

                var data={
                    "prod_id": prod_id,
                    "quantity": quantity,
                    "newPrice":updatePrice
                }
             
                $.ajax({
                    type: "GET",
                    url: "update-cart",
                    data: data,
                    dataType: "dataType",
                    success: function (data) {
                    
                    }
                });
                
            }
            
            break;
        case "-":
            let qty1  = $("#qty").val();
            Number(qty1)

            if (qty1>1) {
                $("#qty").val(Number(qty1)-1);

                var prod_id = $("#hidden").val();
                var quantity = $("#qty").val();
                var fixedPrice  = $("#ProductPrice").val();
            
                 var updatePrice = Number(fixedPrice) * Number(quantity) ;
                $("#priceP").html(updatePrice);
              

                var data={
                    "prod_id": prod_id,
                    "quantity": quantity,
                    "newPrice":updatePrice
                }
                
                $.ajax({
                    type: "GET",
                    url: "update-cart",
                    data: data,
                    dataType: "dataType",
                    success: function (data) {
                    
                    }
                });
                
            }
           
            break;
        default:
            break;
    }

    
});

//aqui termina la alerta del carrito para aumentar y disminuir


//JS para mostrar la alerta del carrito
$("#btnClose").click(function (e) {
    document.getElementById("CartAlert").style.display = "NONE";
})
$("#btnSeguir").click(function(e){
    document.getElementById("CartAlert").style.display = "NONE";
})

});