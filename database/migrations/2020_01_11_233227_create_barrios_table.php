<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ciudad_id');
            $table->string('nombre')->nullable(false)->unique();
            $table->timestamps();

            $table->foreign('ciudad_id')->references('id')->on('ciudades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barrios', function ($table) {
            $table->dropForeign(['ciudad_id']);
        });

        Schema::dropIfExists('barrios');
    }
}
