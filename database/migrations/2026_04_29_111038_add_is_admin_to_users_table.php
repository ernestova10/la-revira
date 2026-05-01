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
        Schema::table('users', function (Blueprint $table) {
            // Añadimos la columna
            $table->boolean('is_admin')->default(false); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Es buena práctica eliminar la columna si deshacemos la migración
            $table->dropColumn('is_admin');
        });
    }
};