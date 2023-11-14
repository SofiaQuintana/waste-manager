<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro de Residuos Reciclados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>`

<body>
    <div class="wrapper">
        @include('layouts.header')

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container mt-5">
            <form method="post" action="{{ route('recycled-waste-inventory.store') }}">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title mb-4">Registro de Residuos Reciclados</h2>
                                <form action="{{ route('recycled-waste-inventory.store') }}" method="post">
                                    @csrf
                            
                                    <div class="mb-3">
                                        <label for="name"  class="form-label">Nombre:</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="amount"  class="form-label">Cantidad:</label>
                                        <input type="number" name="amount" class="form-control" required>
                                    </div>
                                  
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success">Guardar Datos</button>
                                    </div>
            
                                    <div class="d-grid mt-3">
                                        <a href="{{ route('recycled-waste-inventory.index') }}" class="btn btn-secondary">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>      
        </div>
    </div>
@include('layouts.scripts')
</body>
