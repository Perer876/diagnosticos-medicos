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
        Schema::create('evaluacion_sintoma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluacion_id')->constrained('evaluaciones');
            $table->foreignId('sintoma_id')->constrained('sintomas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion_sintoma');
    }
};
