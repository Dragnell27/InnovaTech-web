
<form method="POST" action="{{ route('cart.store') }}">
    @csrf
        {{ $slot }} 
        <div class="col-6 col-sm-6 col-md-8 col-lg-10 col-xl-11 col-xxl-12">
            <input type="submit" class="btn btn-warning kart" id="btnCarro" value="Añadir al carrito" >
        </div>
</form>