<!-- En tu archivo Blade o en tu plantilla principal -->
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- ...otros encabezados... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>
<body>
    <!-- ...contenido... -->
    <div class="wrapper">
        <!-- resources/views/employee/index.blade.php -->
        @include('layouts.header')
        <div class="tablas">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <table>
                <thead>
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
        </div>
    </div>
    @include('layouts.scripts')
</body>
</html>