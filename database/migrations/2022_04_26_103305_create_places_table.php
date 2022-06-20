<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_type_of_place')->unsigned();
            $table->integer('id_governorate')->unsigned();
            $table->string('phoneNumber')->nullable();
            $table->integer('evaluation')->nullable();
            $table->string('name');
            $table->longText('details')->nullable();
            $table->foreign('id_type_of_place')->references('id')->on('types_of_places')->onDelete('cascade');
            $table->foreign('id_governorate')->references('id')->on('governorates')->onDelete('cascade');
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
        Schema::dropIfExists('places');
    }
}
