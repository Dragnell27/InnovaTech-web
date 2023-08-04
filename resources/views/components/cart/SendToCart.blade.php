
<form method="POST" action="{{ route('cart.store') }}">
    @csrf
        {{ $slot }} 
        <div class="btn-group">
            <input type="submit" class="btn btn-sm btn-success" id="btnCarro" value="Añadir al carrito" >
        </div>
</form>