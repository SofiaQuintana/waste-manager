<?php

namespace App\Http\Controllers;

use App\Models\Conversions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ConversionsReportsController extends Controller
{
    private function getEmployeeData()
    {
        $employeeData = Session::get('employeeData');
        return $employeeData;
    }

    private function generateConversionsReport($restriction, $startDate, $endDate)
    {
        switch($restriction) {
            case 1: // agrupado por tipo de basura
                $conversions = Conversions::join('waste_inventories', 'waste_inventories.id', '=', 'conversions.waste_inventory_id')
                ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'conversions.recycled_waste_inventory_id')
                ->select(DB::raw('SUM(conversions.waste_amount) as waste_amount'), 
                        'waste_inventories.name as trash', 
                        'recycled_waste_inventories.name as recycled', 
                        DB::raw('SUM(conversions.recycled_amount) as recycled_amount')
                        )
                ->groupBy('waste_inventories.name', 'recycled_waste_inventories.name')
                ->orderBy('waste_amount', 'desc')
                ->get();
                return $conversions;
            case 2: // agrupado por tipo de basura
                $conversions = Conversions::join('waste_inventories', 'waste_inventories.id', '=', 'conversions.waste_inventory_id')
                ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'conversions.recycled_waste_inventory_id')
                ->select(DB::raw('SUM(conversions.waste_amount) as waste_amount'), 
                        'waste_inventories.name as trash', 
                        'recycled_waste_inventories.name as recycled', 
                        DB::raw('SUM(conversions.recycled_amount) as recycled_amount')
                        )
                ->groupBy('waste_inventories.name', 'recycled_waste_inventories.name')
                ->orderBy('recycled_amount', 'desc')
                ->get();
                return $conversions;
            case 3:
                $conversions = Conversions::join('employees', 'employees.id', '=', 'conversions.employee_id')
                ->join('waste_inventories', 'waste_inventories.id', '=', 'conversions.waste_inventory_id')
                ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'conversions.recycled_waste_inventory_id')
                ->whereBetween('conversions.date', [$startDate, $endDate])
                ->get(['conversions.waste_amount as waste_amount', 
                        'conversions.recycled_amount as recycled_amount',
                        'waste_inventories.name as trash', 
                        'recycled_waste_inventories.name as recycled', 
                        'employees.username', 
                        'conversions.date']);
                return $conversions;
            case 4:
                $conversions = Conversions::join('employees', 'employees.id', '=', 'conversions.employee_id')
                ->join('waste_inventories', 'waste_inventories.id', '=', 'conversions.waste_inventory_id')
                ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'conversions.recycled_waste_inventory_id')
                ->select(DB::raw('SUM(conversions.waste_amount) as waste_amount'), 
                        'waste_inventories.name as trash', 
                        'employees.username', 
                        'recycled_waste_inventories.name as recycled', 
                        DB::raw('SUM(conversions.recycled_amount) as recycled_amount')
                        )
                ->groupBy('employees.username', 'waste_inventories.name', 'recycled_waste_inventories.name')
                ->orderBy('recycled_amount', 'desc')
                ->get();
                return $conversions;
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeData = $this->getEmployeeData();
        $conversions = Conversions::join('employees', 'employees.id', '=', 'conversions.employee_id')
        ->join('waste_inventories', 'waste_inventories.id', '=', 'conversions.waste_inventory_id')
        ->join('recycled_waste_inventories', 'recycled_waste_inventories.id', '=', 'conversions.recycled_waste_inventory_id')
        ->get(['conversions.waste_amount as waste_amount', 
                'conversions.recycled_amount as recycled_amount',
                'waste_inventories.name as trash', 
                'recycled_waste_inventories.name as recycled', 
                'employees.username', 
                'conversions.date']);
        $isGroupedBy = false;
        $isGroupedByEmployee = false;
        return view('conversions-reports.index', compact('employeeData', 'conversions', 'isGroupedBy', 'isGroupedByEmployee'));
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

       $conversions = $this->generateConversionsReport($data['restriction'], $data['start_date'], $data['end_date']);
       $isGroupedBy = $data['restriction'] == 1 || $data['restriction'] == 2;
       $isGroupedByEmployee = $data['restriction'] == 4;
       $employeeData = $this->getEmployeeData();

       return view('conversions-reports.index', compact('conversions', 'employeeData', 'isGroupedBy', 'isGroupedByEmployee'));
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
