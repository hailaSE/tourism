<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('governorate_id');
            $table->integer('offer_id')->nullable();
            $table->integer('tourist_guide_id');
            $table->integer('transport_id');
            $table->string('name');
            $table->date('trip_date');
            $table->double('cost');
            $table->integer('period');
            $table->double('cost_after_offer')->nullable();
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
        Schema::dropIfExists('trips');
    }
}
