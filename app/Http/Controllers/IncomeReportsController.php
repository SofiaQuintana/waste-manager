<?php

namespace App\Http\Controllers;

use App\Models\WasteIncome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IncomeReportsController extends Controller
{
    private function getEmployeeData()
    {
        $employeeData = Session::get('employeeData');
        return $employeeData;
    }

    private function generateIncomesReport($restriction, $startDate, $endDate)
    {
        switch($restriction) {
            case 1:
                $incomes = WasteIncome::join('waste_inventories', 'waste_inventories.id', '=', 'waste_incomes.waste_inventory_id')
                ->select(DB::raw('SUM(waste_incomes.amount) as waste_amount'), 
                        'waste_inventories.name as trash', 
                        DB::raw('SUM(waste_incomes.cost) as cost')
                        )
                ->groupBy('waste_inventories.name')
                ->orderBy('cost', 'asc')
                ->get();
                return $incomes;
            case 2:
                $incomes = WasteIncome::join('employees', 'employees.id', '=', 'waste_incomes.employee_id')
                ->join('waste_inventories', 'waste_inventories.id', '=', 'waste_incomes.waste_inventory_id')
                ->whereBetween('waste_incomes.date', [$startDate, $endDate])
                ->get(['waste_incomes.amount as waste_amount', 
                        'waste_inventories.name as trash', 
                        'employees.username', 
                        'waste_incomes.cost', 
                        'waste_incomes.date']);
                return $incomes;
            case 3:
                $incomes = WasteIncome::join('employees', 'employees.id', '=', 'waste_incomes.employee_id')
                ->join('waste_inventories', 'waste_inventories.id', '=', 'waste_incomes.waste_inventory_id')
                ->select(DB::raw('SUM(waste_incomes.amount) as waste_amount'), 
                        'waste_inventories.name as trash', 
                        'employees.username', 
                        DB::raw('SUM(waste_incomes.cost) as cost')
                        )
                ->groupBy('employees.username', 'waste_inventories.name')
                ->orderBy('cost', 'desc')
                ->get();
                return $incomes;
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeData = $this->getEmployeeData();
        $incomes = WasteIncome::join('employees', 'employees.id', '=', 'waste_incomes.employee_id')
        ->join('waste_inventories', 'waste_inventories.id', '=', 'waste_incomes.waste_inventory_id')
        ->get(['waste_incomes.amount as waste_amount', 
                'waste_inventories.name as trash', 
                'employees.username', 
                'waste_incomes.cost', 
                'waste_incomes.date']);
        $isGroupedBy = false;
        $isGroupedByEmployee = false;
        return view('incomes-reports.index', compact('employeeData', 'incomes', 'isGroupedBy', 'isGroupedByEmployee'));
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

       $incomes = $this->generateIncomesReport($data['restriction'], $data['start_date'], $data['end_date']);
       $isGroupedBy = $data['restriction'] == 1;
       $isGroupedByEmployee = $data['restriction'] == 3;
       $employeeData = $this->getEmployeeData();

       return view('incomes-reports.index', compact('incomes', 'employeeData', 'isGroupedBy', 'isGroupedByEmployee'));
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
