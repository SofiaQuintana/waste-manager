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
        @include('layouts.header')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Lista de Reciclaje</h2>
                            @if(count($recycledWasteInventories) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recycledWasteInventories as $recycledWasteInventory)
                                            <tr>
                                                <td>{{ $recycledWasteInventory->name }}</td>
                                                <td>{{ $recycledWasteInventory->amount }}</td>
                                                <td>
                                                    <a href="{{ route('recycled-waste-inventory.show', $recycledWasteInventory->id) }}" class="btn btn-success">Detalles</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No hay inventarios de residuos reciclados disponibles.</p>
                            @endif
                            <div class="d-grid mt-3">
                                <a href="{{ route('recycled-waste-inventory.create') }}" class="btn btn-success">Crear Nuevo Registro</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @include('layouts.scripts')
</body>

</html>
