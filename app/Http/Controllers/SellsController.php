<?php

namespace App\Http\Controllers;

use App\Models\RecycledWasteInventory;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Sells;
use Illuminate\Support\Facades\Session;


class SellsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeData = $this->getEmployeeData();
        $sells = Sells::all();
        // dd($sells);
        $data['sells'] = Sells::with(['employee', 'recycledWasteInventory'])->get();
        return view ('sell.index', compact('sells','employeeData'));
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
        //
        $recycledWasteInventories = RecycledWasteInventory::all();
        $employees = Employee::all();
        return view('sell.create', compact('recycledWasteInventories', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //try{
        $request->validate([
            'amount' => 'required|integer',
            'sell_price' => 'required|numeric',
            'employee_id' => 'required',
            'recycled_waste_inventory_id' => 'required',
        ]);


        //obtenemos el recycledWasteInventory por medio del id
        $recycledWasteInventory = RecycledWasteInventory::find($request->input('recycled_waste_inventory_id'));


        //verificamos si hay suficientes elementos

        if ($recycledWasteInventory->amount >= $request->input('amount')) {
            //si es valor de amount en el inventario es mayor que el de la venta procedemos a almacenar la venta

            //Almacenar la venta
            //$request instancia de Illuminate\Http\Request
            //input obtiene los datos de la cadena de consulta como del formulario
            $sell = Sells::create([
                'amount' => $request->input('amount'),
                'sell_price' => $request->input('sell_price'),
                'date' => now(),
                'employee_id' => $request->input('employees_id'),
                'recycled_waste_inventory_id' => $request->input('recycled_waste_inventory_id'),
                
            ]);

            //actualizamos la cantidad en el inventario
            //decrement disminuye la cantidad del inventario en el atributo enviado
            $recycledWasteInventory->decrement('amount', $sell->amount);

            //$employees = Employee::all();
            //return view('sell.create', compact('employees'));
        }else{
            return redirect()->back()->with('error', 'Inventario Insuficiente');
        }

        $employees = Employee::all();
        //return view('sell.create', compact('employees'));
   // }catch(\Exception $e){
     //   return redirect()->back()->with('Error', 'Error en la operacion' .$e->getMessage());
    //}
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
