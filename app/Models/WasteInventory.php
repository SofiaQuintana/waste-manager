<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WasteIncome;
use App\Models\Conversions;

class WasteInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount'
    ];

    public function wasteIncomes()
    {
        return $this->hasMany(WasteIncome::class);
    }

    public function conversions()
    {
        return $this->hasMany(Conversions::class);
    }
}
