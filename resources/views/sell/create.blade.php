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
                <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
            @endforeach
        </select>
        <!-- Mostrar la cantidad disponible -->
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
        <input type="date" name="date" id="date" class="form-control" required>
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
</form>
