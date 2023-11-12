<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\WasteInventory;
use App\Models\RecycledWasteInventory;

class Conversions extends Model
{
    use HasFactory;

    protected $fillable = [
        'waste_inventory_id',
        'waste_amount',
        'recycled_waste_inventory_id',
        'recycled_amount',
        'date',
        'employee_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function wasteInventory()
    {
        return $this->belongsTo(WasteInventory::class);
    }

    public function recycledWasteInventory()
    {
        return $this->belongsTo(RecycledWasteInventory::class);
    }
}
