<div class="col-md-12">
    <div class="card mb-4" data-product-id="{{ $sales->id }}">
        <div class="row">
            <div class="col-md-3">
                <!-- Imagen del producto -->
                <img src="{{ asset('img/Logo-Innova.jpeg') }}" alt="Producto" class="img-fluid">
            </div>
            <div class="col-md-6">
                <!-- Nombre del producto -->
                <h3 class="mt-4">Nombre del producto</h3>
                <!-- Estado del producto -->
                <p class="mt-3">Estado: {{ $sales->estado }}</p>
                <!-- Fecha de entrega -->
                <p class="mt-2">Fecha de entrega: {{ $sales->fechaEntrega }}</p>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <!-- Botón Buy again centrado -->
                <button class="btn btn-primary">Buy again</button>
            </div>
        </div>
    </div>
</div>
