

    <h2>Crear Nuevo Inventario de Residuos Reciclados</h2>

    <form action="{{ route('recycled-waste-inventory.store') }}" method="post">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        <br>

        <label for="amount">Cantidad:</label>
        <input type="number" name="amount" id="amount" value="{{ old('amount') }}" required>
        <br>

        <input type="submit" value="Guardar">
    </form>

    <a href="{{ route('recycled-waste-inventory.index') }}">Regresar al listado</a>
