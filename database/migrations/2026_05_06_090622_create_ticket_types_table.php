<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ejemplo: Costalero, Acólito, Nazareno
            $table->decimal('price', 8, 2); // Ejemplo: 25.00
            $table->integer('stock'); // Cantidad disponible
            $table->integer('reserved_stock')->default(0); // Cantidad reservada/comprada
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_types');
    }
};