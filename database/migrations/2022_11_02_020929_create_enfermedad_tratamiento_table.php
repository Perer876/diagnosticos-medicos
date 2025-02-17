<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedad_tratamiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enfermedad_id')->constrained('enfermedades')->cascadeOnDelete();
            $table->foreignId('tratamiento_id')->constrained('tratamientos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfermedad_tratamiento');
    }
};
