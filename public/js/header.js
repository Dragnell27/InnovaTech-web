
document.addEventListener("DOMContentLoaded", () => {
const cartIcon = document.querySelector("#icono");

$(document).ready(function() {
    $("#cartIcon").mouseover(function() {
        $("#cartLink").css("color", "red");
    });
    
    $("#cartIcon").mouseout(function() {
        $("#cartLink").css("color", "black");
    });
});


    const nav = document.querySelector(".nav"),
        searchIcon = document.querySelector("#searchIcon"),
        navOpenBtn = document.querySelector(".navOpenBtn"),
        navCloseBtn = document.querySelector(".navCloseBtn");
        const icon = document.querySelector("#searchIcon");
        const iconClose = document.querySelector("#search-close");

    searchIcon.addEventListener("click", () => {
        icon.classList.toggle("inactive");
        iconClose.classList.toggle("inactive");
        nav.classList.toggle("openSearch");
        nav.classList.remove("openNav");
        if (nav.classList.contains("openSearch")) {
            return searchIcon.classList.replace("uil-search", "uil-times");
        }
        searchIcon.classList.replace("uil-times", "uil-search");
    });
    iconClose.addEventListener("click", () => {
        icon.classList.toggle("inactive");
        iconClose.classList.toggle("inactive");
        nav.classList.toggle("openSearch");
        nav.classList.remove("openNav");
        if (nav.classList.contains("openSearch")) {
            return searchIcon.classList.replace("uil-search", "uil-times");
        }
        searchIcon.classList.replace("uil-times", "uil-search");
    });



    navCloseBtn.addEventListener("click", () => {
        nav.classList.remove("openNav");
    });
});

function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
}

function toggleSidebar1() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
}

$(document).ready(function () {
    var sugerencias = [];
    var valorOriginal = '';

    $.ajax({
        url: "/sugerencias",
        method: 'get',
        success: function (response) {
            sugerencias = response.sugerencias;
        }
    });

    $(".navOpenBtn").click(function() {
        nav.addClass("openNav");
        nav.removeClass("openSearch");
        $("#searchIcon").removeClass("uil-times").addClass("uil-search");
      });

    $('#query').on('input', function () {
        var nuevoValor = $(this).val();
        if (nuevoValor.length >= 3) {
            var html = ''; // Inicializa el contenido HTML

            sugerencias.forEach(element => {
                if (element.toLowerCase().indexOf(nuevoValor.toLowerCase()) !== -1) {
                    var resaltado = element.replace(new RegExp(nuevoValor, 'gi'),
                        '<strong>$&</strong>');
                    html +=
                        '<div data-value="' + element +
                        '" role="button" autocomplete="false" class="border-bottom llenar_query" style="background: white; padding-left: 10px;">' +
                        resaltado + '</div>';
                }
            });
            $('#sugerenciasContainer').html(html);
        } else {
            $('#sugerenciasContainer').empty();
        }
    });

    $('#sugerenciasContainer').on('mouseenter', '.llenar_query', function () {
        var valor = $(this).data('value');
        $(this).addClass('hovered');
        valorOriginal = $('#query').val(); // Almacenar el valor original
        $('#query').val(valor);
    });

    $('#sugerenciasContainer').on('mouseleave', '.llenar_query', function () {
        $(this).removeClass('hovered');
        $('#query').val(valorOriginal); // Restaurar el valor original
    });


    $(document).on('click', '.llenar_query', function () {
        var valor = $(this).data('value');
        $('#query').val(valor);
        $('#sugerenciasContainer').empty();
        $('#botonOculto').click();
    });
});
