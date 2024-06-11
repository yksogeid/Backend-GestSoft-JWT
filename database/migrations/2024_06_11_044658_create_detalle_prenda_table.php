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
        Schema::create('detalle_prenda_interes', function (Blueprint $table) {
            $table->id('idDetallePrenda');
            $table->unsignedBigInteger('idPersona');
            $table->string('nombrePrenda');
            $table->unsignedBigInteger('idGenero'); // Añadir la columna de clave foránea
            $table->timestamps();
            // Definir la clave foránea
            $table->foreign('idGenero')->references('idGenero')->on('generos_gen')->onDelete('cascade');
            $table->foreign('idPersona')->references('idPersona')->on('persona')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_prenda_interes');
    }
};
