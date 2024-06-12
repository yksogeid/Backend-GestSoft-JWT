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
            $table->unsignedBigInteger('idGenero');
            $table->unsignedBigInteger('idTalla'); // Nueva columna para talla
            $table->unsignedBigInteger('idColor'); // Nueva columna para color
            $table->timestamps();
            
            // Definir las claves foráneas
            $table->foreign('idGenero')->references('idGenero')->on('generos_gen')->onDelete('cascade');
            $table->foreign('idPersona')->references('idPersona')->on('persona')->onDelete('cascade');
            $table->foreign('idTalla')->references('idTalla')->on('talla')->onDelete('cascade');
            $table->foreign('idColor')->references('idColor')->on('color')->onDelete('cascade');
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
