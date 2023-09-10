<style>

    .modal{
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
  .modal--openModal{
      opacity: 1;
      pointer-events: unset;
      transition: opacity .6s;
    --transform: translateY(0);

  }

  .modal_container{
      margin: auto;
      width: 50%;
      min-width: 100px;
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
  }
  .cerrar{
    display: inline-block;
    text-decoration: none;
}
.cerrar:hover{
    color:  rgb(255, 6, 6);

}
  /* .cerrar{
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
  .cerrar:hover{
      color:#f26250;
      background-color: white;
  } */
  .Aceptar{
      text-decoration: none;
      color: white;
      background-color: #4285f4;
      padding: 10px 20px;
      border:1px solid;
      border-radius: 6px;
      display: inline-block;
      font-weight: 500;
      transition: background-color 0.3s, color 0.3s;
      cursor: pointer;
      outline: none;
  }
  .Aceptar:hover{
      color: #4285f4;
      background-color: white;
  }
</style>
<div class="modal" id="factura">

    <div class="modal_container">
        <div style="margin-left: 105%;margin-top: -10%;">
            <a href="" class="cerrar "> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
              </svg></a>
        </div>
                -------------------------------------
        <p>Orden #8234<br>
            INNOVA TECH<p>
                -------------------------------------
                <p>Nit. 14679413-4<br>
                    Cel.: 3145422432<p>
                        -------------------------------------
                        <p>Tipo de orden: Domicilio<br>
                            Direccion: Calle 84 B #20-07<br>
                            Barrio: Valle grande<br>
                            indicaciones:<br>
                            Cliente Dfanmanrique
                        </p>
                        -------------------------------------
                        <div class="mb-4">
                            <input type="submit" value="Confirmar Compra" class="Aceptar">

                        </div>

    </div>
</div>


</section>
