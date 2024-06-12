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
        Schema::create('venta_vta', function (Blueprint $table) {
            $table->id('idVenta');
            $table->unsignedBigInteger('idPersona');
            $table->timestamps();
            $table->date('fecha');
            $table->float('total');
            $table->foreign('idPersona')->references('idPersona')->on('persona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_vta');
    }
};
