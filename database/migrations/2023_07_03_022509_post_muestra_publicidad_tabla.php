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
        Schema::create('postMuestraPublicidad', function (Blueprint $table) {
            $table->unsignedBigInteger('idPost');
            $table->unsignedBigInteger('idPublicidad');
            $table->foreign('idPost')->references('id')->on('post');
            $table->foreign('idPublicidad')->references('id')->on('publicidad');
            $table->primary(['idPost', 'idPublicidad']);
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postMuestraPublicidad');    
    }
};
