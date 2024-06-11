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
        Schema::create('persona', function (Blueprint $table) {
            $table->id('idPersona');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('correo');
            $table->string('celular');
            $table->unsignedBigInteger('idGenero');
            $table->boolean('esAdmin')->default(false);
            $table->timestamps();
            $table->foreign('idGenero')->references('idGenero')->on('generos_gen')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
