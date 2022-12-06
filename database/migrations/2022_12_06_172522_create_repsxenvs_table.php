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
        Schema::create('repsxenvs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('repuesto_id')->constrained('repuestos');
            $table->foreignId('envio_id')->constrained('envios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repsxenvs');
    }
};
