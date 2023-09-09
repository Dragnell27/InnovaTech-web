<style>
    * {
        font-family: sans-serif;
    }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #111111bd;
        display: flex;
        opacity: 0;
        pointer-events: none;
        transition: opacity .6s;
        --transform: translateY(-100vh);
        --trasition: transform .8s;
    }

    .modal--openModal {
        opacity: 1;
        pointer-events: unset;
        transition: opacity .6s;
        --transform: translateY(0);

    }

    .modal_container {
        margin: auto;
        width: 50%;
        min-width: 430px;
        max-width: 100%;
        max-height: 100%;
        background-color: rgb(255, 255, 255);
        border-radius: 6px;
        padding: 3em 2.5em;
        display: grid;
        gap: 1em;
        place-items: center;
        grid-auto-columns: 100%;
        transform: var(--transform);
        transition: var(--trasition);
        overflow: auto;
    }

    .cerrar {
        display: inline-block;
        text-decoration: none;
    }

    .cerrar:hover {
        color: rgb(255, 6, 6);

    }

    .cerrar {
        text-decoration: none;
        color: white;
        background-color: #f26250;
        padding: 10px 20px;
        border: 1px solid;
        border-radius: 6px;
        display: inline-block;
        font-weight: 300px;
        transition: background-color .3s;
    }

    .cerrar:hover {
        color: #f26250;
        background-color: white;
    }

    .Aceptar {
        text-decoration: none;
        color: white;
        background-color: #4285f4;
        padding: 10px 20px;
        border: 1px solid;
        border-radius: 6px;
        display: inline-block;
        font-weight: 500;
        transition: background-color 0.3s, color 0.3s;
        cursor: pointer;
        outline: none;
    }

    .Aceptar:hover {
        color: #4285f4;
        background-color: white;
    }

    .tituloF {
        margin-bottom: -10px;
        font-weight: 700px;
        font-size: 50px
    }

    @media screen and (max-width:768px) {
        .tituloF {
            font-size: 30px
        }
    }

    table {
        color: black;
        font-size: 14px;
        table-layout: fixed;
        border-collapse: collapse;
        background-color: #f8f8f8;
        overflow: auto;
        text-align: center;
    }

    thead {
        color: #fff;
        background: rgb(243 0 0 / 79%);

    }

    th {
        padding: 20px 15px;
        font-weight: 700;
        text-transform: uppercase;
    }

    td {
        padding: 15px;
        border-bottom: border: solid 2px rgb(0 0 0 / 65%);
        ;
    }

    tbody tr {
        font-size: 12px;

        font-weight: 700;
        text-transform: uppercase;

    }

    tbody tr:hover {
        box-shadow: 0 2px 5px rgb(253 8 8 / 79%);
    }

    .PrecioTotal {
        width: 300px;
        background-color: #ffffff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgb(253 8 8 / 79%);
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }
</style>
<section>
    <div class="modal" id="factura">
        <div class="modal_container mb-2" style="margin-top:5%">
            <img src="{{ asset('img/logo-i.png') }}" id="imagen-logo">
            <h1 class="tituloF">Recibo de Compra</h1>
            <div class="container text-center">
                <div class="row">
                    <div class="col-6">
                        <span>Factura No: <strong id="idFactura">00ID FACTURA</strong> </span>
                    </div>
                    <div class="col-6">
                        <span>Fecha de facturación: <strong id="fechaFactura">DIA/MES/AÑO</strong> </span>
                    </div>
                    <div class="container  d-flex justify-content-center align-items-center mt-2">
                        <span>Cliente: <strong id="NamePeople">Nombre De la persona</strong></span>
                    </div>
                    <div class="col-6">
                        <span>No.Identificación: <strong id="idDocument">Documento</strong></span>
                    </div>
                    <div class="col-6">
                        <span> Lugar de envio y/o Entrega: <strong id="idDireccion">Dirección</strong></span>
                    </div>
                </div>
            </div>
            <div class="table-resposive">
                <table class="table" style=" border: solid 2px rgb(0 0 0 / 65%); ">
                    <thead>
                        <tr>
                            <th class="nameTH">No.</th>

                            <th class="nameTH">Producto</th>
                            <th class="nameTH">Precio </th>
                            <th class="nameTH">Cantidad </th>
                            <th class="nameTH">total </th>

                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td class="nameTD">1</td>
                            <td class="nameTD">televisor</td>
                            <td class="nameTD">100000</td>
                            <td class="nameTD">1</td>
                            <td class="nameTD">10000</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="PrecioTotal">
                <span>Precio total(COP):
                    <strong>$10000</strong>
            </div>

            </span>

            <div class="mb-2">
                <input type="submit" value="Confirmar Compra" class="Aceptar">
                <input type="submit" value="Cancelar" class="cerrar ">
            </div>

        </div>
    </div>

</section>
