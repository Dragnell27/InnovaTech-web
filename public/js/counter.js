window.addEventListener("load", async () => {
    isChecked = "{{ $checked }}";
    if (isChecked == "true") {
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Datos que se enviarán en la solicitud (incluyendo el token CSRF)
        var datos = '_token=' + token + '&valor=mi-valor-de-sesion';

        $.ajax({
            type: "post",
            url: "/mySales",
            data: datos,
            dataType: "JSON",
            success: function(data) {
                document.getElementById("counter").innerHTML = data.length;

            },
            error: function(data) {
                console.log("error");

            }
        });
    }
})