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
        Schema::create('usuario_realiza_post', function (Blueprint $table) {
            $table->unsignedBigInteger('idPost');
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idPost')->references('id')->on('post');
            $table->foreign('idUsuario')->references('id')->on('usuario');
            $table->primary('idPost');
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_realiza_post');  
    }
};
