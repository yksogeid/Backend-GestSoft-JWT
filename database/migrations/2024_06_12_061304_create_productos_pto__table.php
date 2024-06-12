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
        Schema::create('productos_pto', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('nombre');
            $table->string('descripcion');
            $table->float('precio');
            $table->integer('stock');
            $table->unsignedBigInteger('idTalla');
            $table->unsignedBigInteger('idColor');
            $table->timestamps();
            $table->foreign('idTalla')->references('idTalla')->on('talla')->onDelete('cascade');
            $table->foreign('idColor')->references('idColor')->on('color')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_pto');
    }
};
