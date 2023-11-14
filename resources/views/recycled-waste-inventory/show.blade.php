


    <h2>Detalles del Inventario de Residuos Reciclados</h2>

    <p><strong>Nombre:</strong> {{ $recycledWasteInventory->name }}</p>
    <p><strong>Cantidad:</strong> {{ $recycledWasteInventory->amount }}</p>

    <a href="{{ route('recycled-waste-inventory.index') }}">Regresar al listado</a>
