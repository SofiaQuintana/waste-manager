<ul>
    @if($employeeData['roleDescription'] === 'Admin')
        <li><a href="{{ url('employee/index') }}">
            <span class="item">Lista de Empleados</span>
        </a></li>
        <li><a href="{{ url('employee/create') }}">
            <span class="item">Registrar empleado</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'WasteClassifier')
        <li><a href="{{ url('employee.index') }}">
            <span class="item">Principal</span>
        </a></li>
        <li><a href="{{ url('employee/create') }}">
            <span class="item">Registrar empleado</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'Operator')
        <li><a href="{{ url('operator/index') }}">
            <span class="item">Lista de reciclaje</span>
        </a></li>
        <li><a href="{{ url('employee/create') }}">
            <span class="item">Registrar reciclaje</span>
        </a></li>
    @elseif($employeeData['roleDescription'] === 'Manager')
        <li><a href="/resources//views/Reportes.php">
            <span class="item">Reportes</span>
        </a></li>

    @endif
    <li><a href="/resources//views/inventario.php">
        <span class="item">Ver inventario</span>
    </a></li>
   
   
</ul>