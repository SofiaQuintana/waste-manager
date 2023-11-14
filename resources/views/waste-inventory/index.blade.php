inventario 

<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Inventario de Residuos</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($waste_inventories as $wasteInventory)
                                <tr>
                                    <td>{{ $wasteInventory->id }}</td>
                                    <td>{{ $wasteInventory->name }}</td>
                                    <td>{{ $wasteInventory->amount }}</td>
                                    <td>
                                        <a href="{{ route('waste-inventory.edit', $wasteInventory->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <form action="{{ route('waste-inventory.destroy', $wasteInventory->id) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-grid mt-3">
                            <a href="{{ route('waste-inventory.create') }}" class="btn btn-success">Crear Nuevo Registro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>