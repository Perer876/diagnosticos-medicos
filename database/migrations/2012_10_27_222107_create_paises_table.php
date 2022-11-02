<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->char('codigo', 2)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paises');
    }
};
