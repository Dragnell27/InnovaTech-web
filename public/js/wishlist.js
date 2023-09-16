$(document).ready(function () {
    $('.ir-producto').on('click', function () {
        var url = $(this).attr('data-url');
        window.location.href = url;
    });
});

$(document).ready(function() {
    $('#carouselExampleFade').hover(
        function() {

        },
        function() {
            
        }
    );
});

$(document).ready(function () {
    $(document).on('click', '.no_agregado_favoritos, .agregado_favoritos', function () {
        var button = $(this);
        var productoId = button.data('product_id');
        var listaId = button.data('lista_id');
        button.prop('disabled', true);
        if (button.hasClass('no_agregado_favoritos')) {
            $.ajax({
                url: "/wishlist",
                method: 'POST',
                data: {
                    _token: token,
                    product_id: productoId
                },
                success: function (response) {
                    if (response.id==null) {
                        window.location.href = response;
                    }else{
                        button.data('lista_id', response.id);
                        button.toggleClass('no_agregado_favoritos agregado_favoritos');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus,
                        errorThrown);
                    alert('Error al agregar a la lista.');
                },
                complete: function () {
                    // Habilita el botón después de completar la solicitud, independientemente del resultado
                    button.prop('disabled', false);
                }
            });
        } else if (button.hasClass('agregado_favoritos')) {
            $.ajax({
                url: "/wishlist/:product_id'".replace(
                    ':product_id', listaId),
                method: 'delete',
                data: {
                    _token: token,
                    product_id: listaId
                },
                success: function (response) {
                    button.toggleClass('no_agregado_favoritos agregado_favoritos');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus,
                        errorThrown);
                    alert('Error al eliminar de la lista.');
                },
                complete: function () {
                    button.prop('disabled', false);
                }
            });
        }
    });
});
