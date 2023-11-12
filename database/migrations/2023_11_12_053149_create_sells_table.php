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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->decimal('sell_price', 8, 2);
            $table->date('date');
            // Foreign key reference to employees table
            $table->foreignId('employee_id')->constrained('employees');
            // Foreign key reference to recycled waste inventory table
            $table->foreignId('recycled_waste_inventory_id')->constrained('recycled_waste_inventory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
