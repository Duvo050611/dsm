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
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // ID Venta
            $table->date('date'); // Fecha de la venta
            $table->integer('quantity'); // Cantidad vendida
            $table->decimal('unit_price', 10, 2); // Precio unitario
            $table->decimal('total', 10, 2); // Total de la venta
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
