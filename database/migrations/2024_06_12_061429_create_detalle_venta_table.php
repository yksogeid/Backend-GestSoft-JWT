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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('idDetalleVenta');
            $table->unsignedBigInteger('idVenta');
            $table->unsignedBigInteger('idProducto');
            $table->timestamps();
            $table->foreign('idVenta')->references('idVenta')->on('venta_vta')->onDelete('cascade');
            $table->foreign('idProducto')->references('idProducto')->on('productos_pto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};
