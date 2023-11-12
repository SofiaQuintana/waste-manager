<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRole as RoleEnum;
use App\Models\WasteIncome;
use App\Models\Conversions;
use App\Models\Sells;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'cui',
        'username',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'role' => RoleEnum::class
    ];

    public function wasteIncomes()
    {
        return $this->hasMany(WasteIncome::class);
    }

    public function conversions()
    {
        return $this->hasMany(Conversions::class);
    }

    public function sells()
    {
        return $this->hasMany(Sells::class);
    }   
}
