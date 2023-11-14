<!-- resources/views/recycledWasteInventory/index.blade.php -->




    <h2>Listado de Inventario de Residuos Reciclados</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <!-- Otros campos si es necesario -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recycledWasteInventories as $recycledWasteInventory)
                <tr>
                    <td>{{ $recycledWasteInventory->name }}</td>
                    <td>{{ $recycledWasteInventory->amount }}</td>
                    <!-- Otros campos si es necesario -->
                    <td>
                        <a href="{{ route('recycled-waste-inventory.show', $recycledWasteInventory->id) }}" class="btn btn-info">Detalles</a>
                        <!-- Agrega otros botones de acciones si es necesario -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('recycled-waste-inventory.create') }}" class="btn btn-success">Crear Inventario</a>

