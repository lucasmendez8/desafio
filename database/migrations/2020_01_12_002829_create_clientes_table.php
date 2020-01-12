<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres')->nullable(false);
            $table->string('apellidos')->nullable(false);
            $table->string('cuit', 11)->nullable(false);
            $table->string('direccion')->nullable(false);

            $table->unsignedBigInteger('barrio_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('servicio_id');

            $table->boolean('estado_servicio');

            $table->foreign('barrio_id')->references('id')->on('barrios');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('servicio_id')->references('id')->on('servicios');

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
        Schema::table('clientes', function ($table) {
            $table->dropForeign(['barrio_id']);
            $table->dropForeign(['ciudad_id']);
            $table->dropForeign(['servicio_id']);
        });

        Schema::dropIfExists('clientes');
    }
}
