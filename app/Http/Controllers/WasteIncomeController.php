<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\WasteIncome;
use App\Models\WasteInventory;
use Illuminate\Http\Request;

class WasteIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['waste_incomes'] = WasteIncome::paginate(100);
        return view ('waste-income.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //se obtienen todos los empleados del modelo Employee
        $employees = Employee::all();
        //se obtienen todos los elementos del inventario
        $wasteInventories = WasteInventory::all();

        return view('waste-income.create', compact('employees', 'wasteInventories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'cost' => 'required||numeric',
            'amount' => 'required||integer',
            'date' => 'required||date',
            'employee_id' => 'required|exists:employees,id',
            'waste_inventory_id' => 'required|exists:waste_inventories,id',
        ]);

        //Ingreso de un nuevo residuo
        $wasteIncome = WasteIncome::create($data);

        //Actualizamos el atributo amount de wasteinventory
        $wasteInventory = $wasteIncome->wasteInventory;
        $wasteInventory->amount += $wasteIncome->amount;
        $wasteInventory->save();

        return redirect()->route('waste-income.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
