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
        Schema::create('PostMuestraPublicidad', function (Blueprint $table) {
            $table->unsignedBigInteger('idPost');
            $table->unsignedBigInteger('idPublicidad');
            $table->foreign('idPost')->references('id')->on('Post');
            $table->foreign('idPublicidad')->references('id')->on('Publicidad');
            $table->primary(['idPost', 'idPublicidad']);
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PostMuestraPublicidad');    
    }
};
