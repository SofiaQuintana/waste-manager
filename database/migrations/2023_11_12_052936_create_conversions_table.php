<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conversions', function (Blueprint $table) {
            $table->id();
            $table->integer('waste_amount');
            $table->integer('recycled_amount');
            $table->date('date');
            // Foreign key reference to waste inventory table
            $table->foreignId('waste_inventory_id')->constrained('waste_inventory');
            // Foreign key reference to recycled waste inventory table
            $table->foreignId('recycled_waste_inventory_id')->constrained('recycled_waste_inventory');
            // Foreign key reference to employees table
            $table->foreignId('employee_id')->constrained('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversions');
    }
};
