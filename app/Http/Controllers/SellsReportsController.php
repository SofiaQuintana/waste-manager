<?php

namespace App\Http\Controllers;

use App\Models\Sells;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SellsReportsController extends Controller
{
    private function getEmployeeData()
    {
        $employeeData = Session::get('employeeData');
        return $employeeData;
    }

    private function generateSellsReport($restriction, $startDate, $endDate)
    {
        switch($restriction) {
            case 1:
                $sells = Sells::join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'sells.recycled_waste_inventory_id')
                ->select(DB::raw('SUM(sells.amount) as waste_amount'), 
                        'recycled_waste_inventories.name as recycled', 
                        DB::raw('SUM(sells.sell_price) as sell_price')
                        )
                ->groupBy('recycled_waste_inventories.name')
                ->orderBy('sell_price', 'desc')
                ->get();
                return $sells;
            case 2:
                $sells = Sells::join('employees', 'employees.id', '=', 'sells.employee_id')
                ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'sells.recycled_waste_inventory_id')
                ->whereBetween('sells.date', [$startDate, $endDate])
                ->get(['sells.amount as waste_amount', 
                        'recycled_waste_inventories.name as recycled', 
                        'employees.username', 
                        'sells.sell_price', 
                        'sells.date']);
                return $sells;
            case 3:
                $sells = Sells::join('employees', 'employees.id', '=', 'sells.employee_id')
                ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'sells.recycled_waste_inventory_id')
                ->select(DB::raw('SUM(sells.amount) as waste_amount'), 
                        'recycled_waste_inventories.name as recycled', 
                        'employees.username', 
                        DB::raw('SUM(sells.sell_price) as sell_price')
                        )
                ->groupBy('employees.username', 'recycled_waste_inventories.name')
                ->orderBy('sell_price', 'desc')
                ->get();
                return $sells;
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeData = $this->getEmployeeData();
        $sells = Sells::join('employees', 'employees.id', '=', 'sells.employee_id')
        ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'sells.recycled_waste_inventory_id')
        ->get(['sells.amount as waste_amount', 
                'recycled_waste_inventories.name as recycled', 
                'employees.username', 
                'sells.sell_price', 
                'sells.date']);
        $isGroupedBy = false;
        $isGroupedByEmployee = false;
        return view('sells-reports.index', compact('employeeData', 'sells', 'isGroupedBy', 'isGroupedByEmployee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'restriction' => 'required',
            'start_date' => 'date',
            'end_date' => 'date',
        ]);

       $sells = $this->generateSellsReport($data['restriction'], $data['start_date'], $data['end_date']);
       $isGroupedBy = $data['restriction'] == 1;
       $isGroupedByEmployee = $data['restriction'] == 3;
       $employeeData = $this->getEmployeeData();

       return view('sells-reports.index', compact('sells', 'employeeData', 'isGroupedBy', 'isGroupedByEmployee'));
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
