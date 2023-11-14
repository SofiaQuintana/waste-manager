<?php

namespace App\Http\Controllers;
use App\Models\WasteInventory;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class WasteInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['waste_inventories'] = WasteInventory::paginate(100);
        return view('waste-inventory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

        return view( 'waste-inventory.create');
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

        return redirect('waste-inventory.index')-> with('message', 'Agregado Exitosamente');


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
        $waste_inventory = WasteInventory::findOrFail($id);
        return view('waste-inventory.edit', compact('waste_inventory'));
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
