<!-- En tu archivo Blade o en tu plantilla principal -->
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- ...otros encabezados... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- ...contenido... -->

    <!-- resources/views/employee/index.blade.php -->


@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
@endif


<a href="{{ url('employee/create') }}" class="btn btn-primary mb-2">Registrar empleado</a>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->username }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ \App\Enums\UserRole::getDescription($employee->role->value) }}</td>
                <td>
                    <a href="{{ url('employee/'.$employee->id.'/edit') }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('employee.destroy', $employee->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confirmar')">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


    <!-- Scripts de Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>