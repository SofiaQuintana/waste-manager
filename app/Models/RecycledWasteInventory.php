<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conversions;
use App\Models\Sells;

class RecycledWasteInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount'
    ];

    public function conversions()
    {
        return $this->hasMany(Conversions::class);
    }

    public function sells()
    {
        return $this->hasMany(Sells::class);
    }   
}
