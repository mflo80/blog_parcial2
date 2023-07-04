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
        Schema::create('Historial', function (Blueprint $table) {
            $table->bigIncrements('idHistorial');
            $table->timestamp('fechaHoraCambio');
            $table->unsignedBigInteger('idPost')->nullable();
            $table->foreign('idPost')->references('idPost')->on('UsuarioRealizaPost');
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Historial');
    }
};
