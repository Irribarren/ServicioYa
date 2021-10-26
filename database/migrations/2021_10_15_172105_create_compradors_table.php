<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compradors', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 80);
            $table->string('apellidos', 80);
            $table->string('correo', 80);
            $table->string('documento', 80);
            $table->string('telefono', 80);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compradors');
    }
}
