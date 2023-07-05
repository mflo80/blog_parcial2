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
        Schema::create('historial', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('fechaHoraCambio');
            $table->unsignedBigInteger('idPost');
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idPost')->references('id')->on('post');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial');
    }
};
