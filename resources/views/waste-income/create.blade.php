@php
use App\Models\Employee;
use App\Models\WasteInventory;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro de Ingresos</title>
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
            <form method="post" action="{{ route('waste-income.store') }}">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title mb-4">Registro de Ingresos</h2>
                                <form action="{{ route('waste-inventory.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Cantidad:</label>
                                        <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cost" class="form-label">Costo</label>
                                        <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="employee_id" class="form-label">Empleado:</label>
                                        <select class="form-select" id="employee_id" name="employee_id">
                                            <option value="" selected disabled>Select Employee</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="waste_inventory_id" class="form-label">Tipo de Residuo:</label>
                                        <select class="form-select" id="waste_inventory_id" name="waste_inventory_id">
                                            <option value="" selected disabled>Select Waste Inventory</option>
                                            @foreach ($wasteInventories as $inventory)
                                                <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Fecha:</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date', \Carbon\Carbon::now()->toDateString()) }}">
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success">Guardar Datos</button>
                                    </div>
            
                                    <div class="d-grid mt-3">
                                        <a href="{{ route('waste-income.index') }}" class="btn btn-secondary">Regresar</a>
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
