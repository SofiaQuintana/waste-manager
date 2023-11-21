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
                            <h2 class="card-title mb-4">Lista de residuos convertidos en reciclaje</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Residuo</th>
                                        <th>Cantidad</th>
                                        <th>Convertido en</th>
                                        <th>Cantidad</th>
                                        <th>Fecha</th>
                                        <th>Empleado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($conversions as $conversion)
                                    <tr>
                                        <td>{{ $conversion->waste }}</td>
                                        <td>{{ $conversion->waste_amount }}</td>
                                        <td>{{ $conversion->recycled }}</td>
                                        <td>{{ $conversion->recycled_amount }}</td>
                                        <td>{{ $conversion->date }}</td>
                                        <td>{{ $conversion->username }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">No conversions found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @include('layouts.scripts')
</body>

</html>
