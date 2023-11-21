<!DOCTYPE html>
<html lang="en">


<head>
    <!-- ...otros encabezados... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}"> 

</head>
    <div class="wrapper">

    @include('layouts.header')
    <div class="Empleado">
        <h1>Registro de Ventas</h1>
        <form action="{{ route('sell.store') }}" method="post" class="container mt-4">
    @csrf

    <div class="mb-3">
        <label for="employee_id" class="form-label">Empleado:</label>
        <select value="{{ $employeeData['id'] }}" class="form-select" id="employee_id" name="employee_id" disabled>
            <option value="{{ $employeeData['id'] }}" selected>{{ $employeeData['username'] }}</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="recycled_waste_inventory_id" class="form-label">Elige un Producto en Stock:</label>
        <select name="recycled_waste_inventory_id" id="recycled_waste_inventory_id" class="form-select" required
                data-inventories="{{ json_encode($recycledWasteInventories->pluck('amount', 'id')) }}">
            @foreach($recycledWasteInventories as $inventory)
                {{ $inventory->id }}
                <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
            @endforeach
        </select>

        <span id="available_amount"></span>
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Cantidad a Vender:</label>
        <input type="text" name="amount" id="amount" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="sell_price" class="form-label">Precio de Venta:</label>
        <input type="text" name="sell_price" id="sell_price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Fecha:</label>
        <input type="date" class="form-control" id="date" name="date" value="{{ old('date', \Carbon\Carbon::now()->toDateString()) }}">
    </div>


    <button type="submit" class="btn btn-primary">Realizar Venta</button>

    @if($errors->any())
    <br>
    <div class="alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <script>
        
        // Script para actualizar la cantidad disponible al seleccionar un producto
        document.getElementById('recycled_waste_inventory_id').addEventListener('change', function () {
            var selectedIndex = this.selectedIndex;
            var availableAmounts = JSON.parse(this.getAttribute('data-inventories'));
            var selectedInventoryId = this.value;
            var availableAmount = availableAmounts[selectedInventoryId];
            document.getElementById('available_amount').textContent = "Cantidad disponible: " + availableAmount;
        });
    </script>

    </div>
    <div class="imagen">
        <img src="https://www.traperosdeemaus.org/mini-slider/reciclaje/reciclaje-general.png" alt="">
    </div>

    </div>
