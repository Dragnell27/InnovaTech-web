$(document).ready(function () {
    //Alerta del carrito 
    $(".changeQuantity").click(function (e) {

        e.preventDefault();
        let operator = e.target.value;
        switch (operator) {
            case "+":
                let qty = $("#qty").val();
                Number(qty)
                if (qty < 20) {
                    $("#qty").val(Number(qty) + 1);

                    var prod_id = $("#hidden").val();
                    var quantity = $("#qty").val();
                    var fixedPrice = $("#ProductPrice").val();
                    var updatePrice = Number(fixedPrice) * Number(quantity);
                    $("#priceP").html(updatePrice);
                    
                    var data = {
                        "prod_id": prod_id,
                        "quantity": quantity,
                        "newPrice": updatePrice
                      
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
                let qty1 = $("#qty").val();
                Number(qty1)

                if (qty1 > 1) {
                    $("#qty").val(Number(qty1) - 1);

                    var prod_id = $("#hidden").val();
                    var quantity = $("#qty").val();
                    var fixedPrice = $("#ProductPrice").val();

                    var updatePrice = Number(fixedPrice) * Number(quantity);
                    $("#priceP").html(updatePrice);


                    var data = {
                        "prod_id": prod_id,
                        "quantity": quantity,
                        "newPrice": updatePrice
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
    $("#btnSeguir").click(function (e) {
        document.getElementById("CartAlert").style.display = "NONE";
    })

});

window.addEventListener("load",()=>{
   const btn = document.querySelectorAll('.btn-cart');
   btn.forEach(boton=>{
        boton.addEventListener("click",()=>{
            const productId =boton.getAttribute('data-id');
            data ={
                "id": productId,
            }
            $.ajax({
                type: "POST",
                url: "Cart-Checkout",
                data: data,
                dataType: "dataType",
                success: function (data) {
                        console.log("exitoso")
                }
            });


            
        });
   });
});


// //Funciones Camilo Alzate 
// const buttonAum = document.getElementById("aumentar");
// const buttonDis = document.getElementById("disminuir");
// const cantidad = document.getElementById("cantidad");
// const spanResul = document.getElementById("resultado");
// const StrongPrecio = document.getElementById("precio");

// let num = 0;

// function aumentarNum(event) {
//     event.preventDefault();
//     if (num < 20) {
//         num++;
//         cantidad.textContent = num;
//     }
//     total();
// }
// function disminuirNum(event) {
//     event.preventDefault();
//     if (num > 1) {
//         num--;
//         cantidad.textContent = num;
//     }
//     total();
// }

// function total() {

//     let total = Number(cantidad.innerHTML) * Number(StrongPrecio.innerHTML);
//     spanResul.innerHTML = total;
// }
// buttonAum.addEventListener("click", aumentarNum);
// buttonDis.addEventListener("click", disminuirNum);
// total();
