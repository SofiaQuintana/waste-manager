<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\WasteInventory;

class WasteIncome extends Model {

    protected $fillable = [
        'cost',
        'amount',
        'date',
        'employee_id',
        'waste_inventory_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function wasteInventory()
    {
        return $this->belongsTo(WasteInventory::class);
    }

}