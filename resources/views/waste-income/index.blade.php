Bienvenidos al ingreso de basura


    <div class="container">
        <h1>Waste Incomes</h1>

        <table class="table">
            <thead>
                <tr>
                    
                    <th>Nombre</th>
                    <th>Residuo</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($waste_incomes as $wasteIncome)
                    <tr>
                        
                        <td>{{ $wasteIncome->employee->name }}</td>
                        <td>{{ $wasteIncome->wasteInventory->name }}</td>
                        <td>{{ $wasteIncome->amount }}</td>
                        <td>{{ $wasteIncome->cost }}</td>
                        <td>{{ $wasteIncome->date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No waste incomes found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
