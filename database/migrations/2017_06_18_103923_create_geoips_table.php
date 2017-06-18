<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geoips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start_ip');
            $table->string('end_ip');
            $table->integer('start_number_ip');
            $table->integer('end_number_ip');
            $table->integer('country_id')->unsigned();
            $table->timestamps();

            $table->foreign('country_id')->references('id')
                ->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geoips');
    }
}
