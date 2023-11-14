<div class="container">
        <h1>Lista de Ventas</h1>

        <table class="table">
            <thead>
                <tr>

                    <th>Cantidad</th>
                    <th>Precio de Venta</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                    <th>Producto en Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sells as $sell)
                    <tr>

                        <td>{{ $sell->amount }}</td>
                        <td>{{ $sell->sell_price }}</td>
                        <td>{{ $sell->date }}</td>
                        <td>{{ $sell->employee->name }}</td>
                        <td>{{ $sell->recycledWasteInventory->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>