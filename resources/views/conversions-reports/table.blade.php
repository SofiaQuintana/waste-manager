@if(count($conversions) > 0)
<table class="table">
    <thead>
        <tr>
            <th>Tipo de Residuo </th>
            <th>Cantidad</th>
            <th>Convertido en </th>
            <th>Cantidad</th>
            @if(!$isGroupedBy)
            <th>Empleado</th>
            @endif
            @if(!$isGroupedBy && !$isGroupedByEmployee)
            <th>Fecha</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($conversions as $conversion)
        <tr>

            <td>{{ $conversion->trash }}</td>
            <td>{{ $conversion->waste_amount }}</td>
            <td>{{ $conversion->recycled }}</td>
            <td>{{ $conversion->recycled_amount }}</td>
            @if(!$isGroupedBy) 
            <td>{{ $conversion->username }}</td>
            @endif
            @if(!$isGroupedBy && !$isGroupedByEmployee)
            <td>{{ $conversion->date }}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
@else
<p>No hay conversiones de residuos disponibles.</p>
@endif