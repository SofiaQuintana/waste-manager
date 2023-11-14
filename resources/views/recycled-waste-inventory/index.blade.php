<!-- resources/views/recycled-waste-inventory/index.blade.php -->




    <h2>Listado de Inventario de Residuos Reciclados</h2>

    @if(count($recycledWasteInventories) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recycledWasteInventories as $recycledWasteInventory)
                    <tr>
                        <td>{{ $recycledWasteInventory->name }}</td>
                        <td>{{ $recycledWasteInventory->amount }}</td>
                        <td>
                            <a href="{{ route('recycled-waste-inventory.show', $recycledWasteInventory->id) }}" class="btn btn-info">Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay inventarios de residuos reciclados disponibles.</p>
    @endif
