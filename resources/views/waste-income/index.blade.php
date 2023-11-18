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
                            <h2 class="card-title mb-4">Lista de Ingresos</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Residuo</th>
                                        <th>Cantidad</th>
                                        <th>Costo</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($waste_incomes as $wasteIncome)
                                    <tr>
                                        <td>{{ $wasteIncome->employee->name }}</td>
                                        <td>{{ $wasteIncome->wasteInventory->name }}</td>
                                        <td>{{ $wasteIncome->amount }}</td>
                                        <td>{{ $wasteIncome->cost }}</td>
                                        <td>{{ $wasteIncome->date }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">No waste incomes found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-grid mt-3">
                                <a href="{{ route('waste-income.create') }}" class="btn btn-success">Crear Nuevo Registro</a>
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
