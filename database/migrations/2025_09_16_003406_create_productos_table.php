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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->decimal('base_price', 10, 2);
            $table->string('base_currency');
            $table->string('unit');
            $table->integer('quantity');
            $table->decimal('iva_rate', 5, 2)->default(21.00);
            $table->decimal('profit_margin', 5, 2)->default(25.00);
            $table->string('final_currency');
            $table->decimal('final_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
