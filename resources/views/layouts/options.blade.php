<ul>
    @if($employeeData['roleDescription'] === 'Admin')
        <li><a href="{{ url('employee/index') }}">
            <span class="item">Lista de Empleados</span>
        </a></li>
        <li><a href="{{ url('employee/create') }}">
            <span class="item">Registrar empleado</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'WasteClassifier')
        <li><a href="{{ url('home') }}">
            <span class="item">Lista de Residuos</span>
        </a></li>
        <li><a href="{{ url('waste-inventory/create') }}">
            <span class="item">Registrar Residuo</span>
        </a></li>
        <li><a href="{{ route('waste-income.index') }}">
            <span class="item">Lista de Ingresos</span>
        </a></li>
        <li><a href="{{ url('waste-inventory.create') }}">
            <span class="item">Registrar Ingreso</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'Operator')
        <li><a href="{{ url('home') }}">
            <span class="item">Lista de reciclaje</span>
        </a></li>
        <li><a href="{{ url('recycled-waste-inventory/create') }}">
            <span class="item">Registrar reciclaje</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'Seller')
    <li><a href="{{ url('home') }}">
        <span class="item">Lista de ventas</span>
    </a></li>
    <li><a href="{{ url('recycled-waste-inventory/create') }}">
        <span class="item">Registrar venta</span>
    </a></li>
    @endif  
</ul>