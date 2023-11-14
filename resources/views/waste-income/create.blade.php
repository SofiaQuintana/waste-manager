@php
use App\Models\Employee;
use App\Models\WasteInventory;
@endphp



<div class="container">
        <h1>Create Waste Income</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('waste-income.store') }}">
            @csrf

            <div class="mb-3">
                <label for="cost" class="form-label">Cost:</label>
                <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}">
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount:</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', \Carbon\Carbon::now()->toDateString()) }}">
            </div>

            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee:</label>
                <select class="form-select" id="employee_id" name="employee_id">
                    <option value="" selected disabled>Select Employee</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="waste_inventory_id" class="form-label">Waste Inventory:</label>
                <select class="form-select" id="waste_inventory_id" name="waste_inventory_id">
                    <option value="" selected disabled>Select Waste Inventory</option>
                    @foreach ($wasteInventories as $inventory)
                        <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Waste Income</button>
        </form>
    </div>
