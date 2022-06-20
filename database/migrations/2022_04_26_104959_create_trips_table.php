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
            $table->increments('id')->unsigned();
            $table->integer('governorate_id')->unsigned();
            $table->integer('offer_id')->nullable()->unsigned();
            $table->integer('tourist_guide_id')->unsigned();
            $table->integer('transport_id')->unsigned();
            $table->string('name');
            $table->date('trip_date');
            $table->double('cost');
            $table->date('starts_at');
            $table->date('ends_at');
            $table->string('tripType');
            $table->longText('details')->nullable();
            $table->double('cost_after_offer')->nullable();
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->foreign('tourist_guide_id')->references('id')->on('tourist_guides')->onDelete('cascade');
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');







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
