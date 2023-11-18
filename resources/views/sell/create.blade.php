<!DOCTYPE html>
<html lang="en">


<head>
    <!-- ...otros encabezados... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}"> 

</head>
  @if(count($errors)>0)
    <div class="alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="wrapper">



    @include('layouts.header')
    <div class="Empleado">
        <h1>Registro de Vntas</h1>
        <form action="{{ route('sell.store') }}" method="post" class="container mt-4">
    @csrf

    <div class="mb-3">
        <label for="employee_id" class="form-label">Selecciona un Empleado:</label>
        <select name="employee_id" id="employee_id" class="form-select" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="recycled_waste_inventories_id" class="form-label">Elige un Producto en Stock:</label>
        <select name="recycled_waste_inventories_id" id="recycled_waste_inventories_id" class="form-select" required
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



    <button type="submit" class="btn btn-primary">Realizar Venta</button>

    <script>
        
        // Script para actualizar la cantidad disponible al seleccionar un producto
        document.getElementById('recycled_waste_inventories_id').addEventListener('change', function () {
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
