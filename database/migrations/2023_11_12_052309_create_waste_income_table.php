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
        Schema::create('waste_income', function (Blueprint $table) {
            $table->id();
            $table->decimal('cost', 10, 2);
            $table->integer('amount');
            $table->date('date');

            // Foreign key reference to employees table
            $table->foreignId('employee_id')->constrained('employees');
            // Foreign key reference to waste inventory table
            $table->foreignId('waste_inventory_id')->constrained('waste_inventory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_income');
    }
};
