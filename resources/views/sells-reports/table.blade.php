@if(count($sells) > 0)
<table class="table">
    <thead>
        <tr>
            <th>Producto Vendido</th>
            <th>Cantidad</th>
            @if($isGroupedBy)
            <th>Ganancia total</th>
            @else
            <th>Precio de Venta</th>
            <th>Empleado</th>
            @endif
            @if(!$isGroupedBy && !$isGroupedByEmployee)
            <th>Fecha</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($sells as $sell)
        <tr>

            <td>{{ $sell->recycled }}</td>
            <td>{{ $sell->waste_amount }}</td>
            <td>{{ $sell->sell_price }}</td>
            @if(!$isGroupedBy) 
            <td>{{ $sell->username }}</td>
            @endif
            @if(!$isGroupedBy && !$isGroupedByEmployee)
            <td>{{ $sell->date }}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
@else
<p>No hay ventas disponibles.</p>
@endif