<!-- resources/views/sells/create.blade.php -->

<form action="{{ route('sells.store') }}" method="post">
    @csrf

    <label for="amount">Amount:</label>
    <input type="text" name="amount" id="amount" required>

    <label for="sell_price">Sell Price:</label>
    <input type="text" name="sell_price" id="sell_price" required>

    <!-- Agrega otros campos del formulario según tus necesidades -->

    <label for="employee_id">Employee:</label>
    <select name="employee_id" id="employee_id" required>
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
        @endforeach
    </select>

    <label for="recycled_waste_inventories_id">Recycled Waste Inventory:</label>
    <select name="recycled_waste_inventories_id" id="recycled_waste_inventories_id" required>
        @foreach($recycledWasteInventories as $inventory)
            <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
        @endforeach
    </select>

    <button type="submit">Submit</button>
</form>