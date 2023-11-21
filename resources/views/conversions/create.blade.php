@php
use App\Models\Employee;
use App\Models\Conversions;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Conversion de basura en reciclaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>`

<body>
    <div class="wrapper">
        @include('layouts.header')

        <div class="double container mt-5">
            <form action="{{ route('conversion.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-left">
                <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Residuo</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="waste_inventory_id" class="form-label">Tipo:</label>
                            <select class="form-select" id="waste_inventory_id" name="waste_inventory_id"
                            data-inventories="{{ json_encode($wasteInventories->pluck('amount', 'id')) }}" >
                                <option value="" selected disabled>Seleccionar residuo</option>
                                @foreach ($wasteInventories as $inventory)
                                    <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label id="available_amount" for="waste_amount" class="form-label">Cantidad:</label>
                            <input type="number" required class="form-control" id="waste_amount" name="waste_amount" min="0" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Peso en libras:</label>
                            <input type="number" required class="form-control" id="weight" name="weight" min="0" value="0" step=".01">
                        </div>
                    </div>
                </div>
                </div>
                <div class="col special-container">
                <div class="special">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </div>
                </div>
                <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Reciclaje</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="recycled_waste_inventory_id" class="form-label">Tipo:</label>
                            <select class="form-select" id="recycled_waste_inventory_id" name="recycled_waste_inventory_id">
                                <option value="" selected disabled>Seleccionar residuo</option>
                                @foreach ($recycledWasteInventories as $inventory)
                                    <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Empleado:</label>
                            <select value="{{ $employeeData['id'] }}" class="form-select" id="employee_id" name="employee_id" disabled>
                                <option value="{{ $employeeData['id'] }}" selected>{{ $employeeData['username'] }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Fecha:</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', \Carbon\Carbon::now()->toDateString()) }}">
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <button type="submit" class="w-100 bnt btn-lg btn-success">Convertir</button>
            </form>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <script>
        
        // Script para actualizar la cantidad disponible al seleccionar un producto
        document.getElementById('waste_inventory_id').addEventListener('change', function () {
            var selectedIndex = this.selectedIndex;
            var availableAmounts = JSON.parse(this.getAttribute('data-inventories'));
            var selectedInventoryId = this.value;
            var availableAmount = availableAmounts[selectedInventoryId];
            document.getElementById('available_amount').textContent = "Cantidad disponible: " + availableAmount;
        });
    </script>
@include('layouts.scripts')
</body>
