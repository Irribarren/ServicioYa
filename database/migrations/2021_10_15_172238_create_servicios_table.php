<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('vendedors_id')->constrained('vendedors');
            $table->foreignId('compradors')->constrained('compradors');
            $table->foreignId('detalle_servicios_id')->constrained('detalle_servicios');
            $table->foreignId('valoraciones_id')->constrained('valoraciones');
            $table->string('nombre', 150);
            $table->string('tipo_servicio', 80);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
