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
                            @if(count($sells) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto Vendido</th>
                                            <th>Cantidad</th>
                                            <th>Precio de Venta</th>
                                            <th>Fecha</th>
                                            <th>Empleado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sells as $sell)
                                        <tr>
                    
                                            <td>{{ $sell->name }}</td>
                                            <td>{{ $sell->var }}</td>
                                            <td>{{ $sell->sell_price }}</td>
                                            <td>{{ $sell->date }}</td>
                                            <td>{{ $sell->username }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No hay ventas disponibles.</p>
                            @endif
                            <div class="d-grid mt-3">
                                <a href="{{ route('sell.create') }}" class="btn btn-success">Registrar Venta</a>
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