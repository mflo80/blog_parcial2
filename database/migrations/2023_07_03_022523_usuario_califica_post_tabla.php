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
        Schema::create('usuario_califica_post', function (Blueprint $table) {
            $table->unsignedBigInteger('idUsuario');
            $table->unsignedBigInteger('idPost');
            $table->enum('puntuacion', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
            $table->date('fecha');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idPost')->references('id')->on('post');
            $table->primary(['idUsuario', 'idPost']);
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_califica_post');    
    }
};
