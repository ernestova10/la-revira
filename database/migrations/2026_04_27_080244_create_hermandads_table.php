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
        Schema::create('hermandades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250)->unique(); 
            $table->string('sede', 150);
            $table->text('descripcion');
            $table->string('fundacion');
            $table->text('historia');
            $table->string('dia_salida');
            $table->text('musica');
            $table->text('info_cristo');
            $table->text('info_virgen');
            $table->string('imagen_tarjeta');
            $table->string('imagen_basilica');
            $table->string('imagen_cristo');
            $table->string('imagen_virgen');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hermandades');
    }
};
