@if(count($incomes) > 0)
<table class="table">
    <thead>
        <tr>
            <th>Basura Ingresada</th>
            <th>Cantidad</th>
            @if($isGroupedBy)
            <th>Costo total</th>
            @else
            <th>Costo de compra</th>
            <th>Empleado</th>
            @endif
            @if(!$isGroupedBy && !$isGroupedByEmployee)
            <th>Fecha</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($incomes as $income)
        <tr>

            <td>{{ $income->trash }}</td>
            <td>{{ $income->waste_amount }}</td>
            <td>{{ $income->cost }}</td>
            @if(!$isGroupedBy) 
            <td>{{ $income->username }}</td>
            @endif
            @if(!$isGroupedBy && !$isGroupedByEmployee)
            <td>{{ $income->date }}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
@else
<p>No hay ingresos de basura disponibles.</p>
@endif