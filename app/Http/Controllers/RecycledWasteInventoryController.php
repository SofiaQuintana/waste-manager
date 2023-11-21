<?php

namespace App\Http\Controllers;

use App\Models\RecycledWasteInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class RecycledWasteInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeData = $this->getEmployeeData();   
        $recycledWasteInventories = RecycledWasteInventory::all();
        return view('recycled-waste-inventory.index', compact('recycledWasteInventories', 'employeeData'));
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
        return view('recycled-waste-inventory.create', compact('employeeData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'name' => 'required||unique:recycled_waste_inventories',
        ]);


        $campos=[
            'name' => 'required',
        ];

        $message=[
            'name.required' => 'el nombre es requerido',
        ];

        $this->validate($request, $campos, $message);

        $recycled_waste_inventory = new RecycledWasteInventory();
        $recycled_waste_inventory->name = $request->input('name');
        $recycled_waste_inventory->amount=0;
        $recycled_waste_inventory->save();

        return redirect()->route('recycled-waste-inventory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $employeeData = $this->getEmployeeData();
        $recycledWasteInventory = RecycledWasteInventory::findOrFail($id);
        return view('recycled-waste-inventory.show', compact('recycledWasteInventory', 'employeeData'));

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
