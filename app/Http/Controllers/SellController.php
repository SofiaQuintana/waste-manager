<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sells;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sell.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'amount' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'employee_id' => 'required|exists:employees.id',
            'recycled_waste_inventories_id' => 'required',
        ]);


        //Almacenar la venta
        Sells::create([

        ]);
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
