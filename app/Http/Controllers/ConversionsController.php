<?php

namespace App\Http\Controllers;

use App\Models\Conversions;
use App\Models\RecycledWasteInventory;
use App\Models\WasteInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ConversionsController extends Controller 
{
    private function getEmployeeData()
    {
        $employeeData = Session::get('employeeData');
        return $employeeData;
    }

    private function calculateCreatedAmountOfRecycledWaste($amount, $weight)
    {
        
        return round($amount * $weight);
    }

    /**
     * Display a listing of conversions.
     */
    public function index()
    {
        $employeeData = $this->getEmployeeData();
        $conversions = Conversions::join('employees', 'employees.id', '=', 'conversions.employee_id')
        ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'conversions.recycled_waste_inventory_id')
        ->join('waste_inventories', 'waste_inventories.id', '=', 'conversions.waste_inventory_id')
        ->get(['conversions.waste_amount as waste_amount', 
                'recycled_waste_inventories.name as recycled', 
                'conversions.recycled_amount as recycled_amount', 
                'waste_inventories.name as waste', 
                'employees.username', 
                'conversions.date']);
        // Obtener todos los datos de la tabla conversions
        return view('conversions.index', compact('employeeData', 'conversions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employeeData = $this->getEmployeeData();
        $wasteInventories = WasteInventory::all();
        $recycledWasteInventories = RecycledWasteInventory::all();

        return view('conversions.create', compact('employeeData', 'wasteInventories', 'recycledWasteInventories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'waste_amount' => 'required|integer',
            'weight' => 'required',
            'employee_id' => 'integer',
            'date' => 'required',
            'waste_inventory_id' => 'required',
            'recycled_waste_inventory_id' => 'required',
        ]);
        $incrementValue = $this->calculateCreatedAmountOfRecycledWaste($data['waste_amount'], $data['weight']);

        $data['employee_id'] = $this->getEmployeeData()['id'];
        $data['recycled_amount'] = $incrementValue;

        //obtenemos el recycledWasteInventory por medio del id
        $recycledWasteInventory = RecycledWasteInventory::find($request->input('recycled_waste_inventory_id'));
        $wasteInventory = WasteInventory::find($request->input('waste_inventory_id'));

        //verificamos si hay suficientes elementos
        if ($wasteInventory->amount >= $data['waste_amount']) {
            $conversion = Conversions::create($data);
            $wasteInventory->decrement('amount', $conversion->waste_amount);
            $recycledWasteInventory->increment('amount', $incrementValue);
            $wasteInventory->save();
            $recycledWasteInventory->save();

            $conversion->save();

            return redirect()->route('conversion.index')->with('message', 'Conversion registrada exitosamente');
        }else{
            return redirect()->route('conversion.create')->with('error', 'Inventario Insuficiente');
        }
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
