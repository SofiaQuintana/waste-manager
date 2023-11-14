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
                            <h2 class="card-title mb-4">Detalles en inventario de  {{ $recycledWasteInventory->name }}</h2>
                            <p><strong>Nombre:</strong> {{ $recycledWasteInventory->name }}</p>
                            <p><strong>Cantidad:</strong> {{ $recycledWasteInventory->amount }}</p>

                            <div class="d-grid mt-3">
                                <a href="{{ route('recycled-waste-inventory.index') }}" class="btn btn-secondary">Regresar</a>
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