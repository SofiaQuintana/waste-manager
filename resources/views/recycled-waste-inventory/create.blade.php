<!-- resources/views/recycled-waste-inventory/create.blade.php -->




    <h2>Ingresar Inventario de Residuos Reciclados</h2>

    <form action="{{ route('recycled-waste-inventory.store') }}" method="post">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" required>

        <label for="amount">Cantidad:</label>
        <input type="number" name="amount" required>

        <button type="submit">Guardar</button>
    </form>
