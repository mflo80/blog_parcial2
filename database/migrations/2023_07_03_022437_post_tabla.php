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
        Schema::create('Post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo', 50);
            $table->string('cuerpo', 1000);
            $table->timestamp('fechaHora');
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Post');
    }
};
