<?php

namespace App\Http\Controllers;
use App\Models\WasteInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WasteInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeData = $this->getEmployeeData();
        $data['waste_inventories'] = WasteInventory::paginate(100);
        return view('waste-inventory.index', $data, compact('employeeData'));
    }

    private function getEmployeeData()
    {
        $employeeData = Session::get('employeeData');
        return $employeeData;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employeeData = $this->getEmployeeData();
        return view( 'waste-inventory.create', compact('employeeData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'name' => 'required',
            'amount' => 'required'
        ];

        $message=[
            'name.required' => 'el nombre es requerido',
            'amount.required' => 'cantidad requerida'
        ];

        $this->validate($request, $campos, $message);

        
        $waste_inventory = new WasteInventory();
        $waste_inventory->name = $request->input('name');
        $waste_inventory->amount= $request->input('amount');
        $waste_inventory->save();

        return redirect()->route('waste-inventory.index')-> with('message', 'Agregado Exitosamente');


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
    public function edit($id)
    {
        $employeeData = $this->getEmployeeData();
        $waste_inventory = WasteInventory::findOrFail($id);
        return view('waste-inventory.edit', compact('waste_inventory', 'employeeData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $waste_inventory_data = request()->except(['_token', '_method']);
        WasteInventory::where('id', $id)->update($waste_inventory_data);

        $waste_inventory = WasteInventory::findOrFail($id);

        return redirect()->route('waste-inventory.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        WasteInventory::destroy($id);
        return redirect('waste-inventory')->with('message', 'Registro borrado');
    }
}
