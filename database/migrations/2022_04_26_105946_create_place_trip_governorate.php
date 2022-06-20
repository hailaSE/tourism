<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceGovTrip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_trip_governorate', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('trip_governorate_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->foreign('trip_governorate_id')->references('id')->on('trip_governorate')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

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
        Schema::dropIfExists('place_gov_trip');
    }
}
