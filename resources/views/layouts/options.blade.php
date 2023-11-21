<ul>
    @if($employeeData['roleDescription'] === 'Admin')
        <li><a href="{{ url('employee/index') }}">
            <span class="item">Lista de empleados</span>
        </a></li>
        <li><a href="{{ url('employee/create') }}">
            <span class="item">Registrar empleado</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'WasteClassifier')
        <li><a href="{{ url('home') }}">
            <span class="item">Inventario de residuos</span>
        </a></li>
        <li><a href="{{ url('waste-inventory/create') }}">
            <span class="item">Registrar tipo de residuo</span>
        </a></li>
        <li><a href="{{ route('waste-income.index') }}">
            <span class="item">Lista de ingresos de residuos</span>
        </a></li>
        <li><a href="{{ url('waste-income/create') }}">
            <span class="item">Registrar ingreso de residuo</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'Operator')
        <li><a href="{{ url('home') }}">
            <span class="item">Inventario de reciclaje</span>
        </a></li>
        <li><a href="{{ url('recycled-waste-inventory/create') }}">
            <span class="item">Registrar tipo de reciclaje</span>
        </a></li>
        <li><a href="{{ route('conversion.index') }}">
            <span class="item">Residuos convertidos</span>
        </a></li>
        <li><a href="{{ url('conversion/create') }}">
            <span class="item">Convertir residuo</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'Seller')
    <li><a href="{{ url('home') }}">
        <span class="item">Lista de ventas</span>
    </a></li>
    <li><a href="{{ url('sell/create') }}">
        <span class="item">Registrar venta</span>
    </a></li>
    @elseif($employeeData['roleDescription'] === 'Manager')
    <li><a href="{{ url('home') }}">
        <span class="item">Reportes de ventas</span>
    </a></li>
    <li><a href="{{ route('incomes-report.index') }}">
        <span class="item">Reportes de ingresos de basura</span>
    </a></li>
    <li><a href="{{ route('conversions-report.index') }}">
        <span class="item">Reportes de conversiones de residuos</span>
    </a></li>
    @endif  
</ul>