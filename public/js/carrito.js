

//cart-alert
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
                    
                    var data = {
                        "prod_id": prod_id,
                        "quantity": quantity,
                        // "newPrice": updatePrice
                      
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
     
                    var data = {
                        "prod_id": prod_id,
                        "quantity": quantity,
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
        $.ajax({
            type: "GET",
            url: "/cart-forget",
            dataType: "dataType",
            success: function (data) {

            }
        });
    })
    $("#btnSeguir").click(function (e) {

        document.getElementById("CartAlert").style.display = "NONE";
        $.ajax({
            type: "GET",
            url: "/cart-forget",
            dataType: "dataType",
            success: function (data) {

            }
        });
    })

});


//js añadir al carrito
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
                url: baseURL + "/Cart-Checkout",
                data: data,
                dataType: "json",
                success: function (data) {
                    
                    $.ajax({
                        url: baseURL +'/cart-added',
                        method: 'GET',
                        data: data,
                        success: function(response) {
                     
                           window.location.href=baseURL
                        },
                        error: function() {
                            
                        }
                    });
                }, 
                error: function(data) {
                  

                }
            });


            
        });
   });
});


//js cart-show
$(document).ready(function (){
    try {
 var btns =    document.querySelectorAll(".btnEliminarCart");
        
        btns.forEach((btn)=>{
            btn.addEventListener("click",(e)=>{
                e.preventDefault()
               
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "Esta acción no se podrá revertir!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var eliminar =  btn.getAttribute("href");
                        window.location.replace(eliminar);
                    }else{
                        Swal.fire(
                            'Cancelado!',
                            'Tu producto no ha sido borrado.',
                            'info'
                        )
                        
                    }
                })
            
            
            });
        })
        
        
        
        
    } catch (error) {
        
    }
   

    $(".qtyChanger").click(function (e) {

        e.preventDefault();
        let operator = e.target.value;
        var datos = operator.split(":");
        var signo =datos[0];
        var prod_id = datos[1]; 
        var qtyId ="qty-"+prod_id;
        var cantidad = document.getElementById(qtyId);

        //Aumentar el precio del total
        var precio = document.getElementById("priceP"+prod_id).innerHTML;
        var spanResul =  document.querySelector("#resultado"); 
        var precioActual  = (spanResul.innerHTML);
    
      

        switch (signo) {
            case "+":
                 var newValue = Number(cantidad.value)+1;
                 if (newValue < 21) {
                    spanResul.innerHTML = (Number(precio) + Number(precioActual) ).toFixed(2);
                    cantidad.value = newValue;
                  var quantity = cantidad.value;
                  var fixedPrice = document.getElementById("ProductPrice"+prod_id);
                  var precio = document.getElementById("priceP"+prod_id);
                  var updatePrice = Number(fixedPrice.value) * Number(quantity)
                  var data = {
                    "prod_id": prod_id,
                    "quantity": quantity,

                  }
                  var data = {
                    "prod_id": prod_id,
                    "quantity": quantity,
                    "newPrice": updatePrice,

                  }
                       $.ajax({
                       type: "GET",
                       url: baseURL+ "/update-cart",
                       data: data,
                       dataType: "dataType",
                       success: function (data) {

                       }
                   });
                 }

                break;
            case "-":
             
                var newValue = Number(cantidad.value)-1;
               
                if (newValue > 0) {
                    spanResul.innerHTML = (Number(precioActual) -Number(precio)  ).toFixed(2);
                    cantidad.value = newValue;
                    var quantity = cantidad.value;
                    var fixedPrice = document.getElementById("ProductPrice"+prod_id);
                    var precio = document.getElementById("priceP"+prod_id);                      
                    var updatePrice = Number(fixedPrice.value) * Number(quantity)
                    var data = {
                      "prod_id": prod_id,
                      "quantity": quantity,
                      "newPrice": updatePrice,
  
                    }
                         $.ajax({
                         type: "GET",
                         url: baseURL+"/update-cart",
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
