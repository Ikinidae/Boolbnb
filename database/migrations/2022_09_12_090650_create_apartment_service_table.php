<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_service', function (Blueprint $table) {
           // QUESTA FORMA NON FUNZIONA
            // $table->unsignedBigInteger('apartment_id');
            // $table->foreignId('apartment_id')->references('id')->on('apartments');

            // FUNZIONA QUESTA FORMA ABBREVIATA
            $table->foreignId('apartment_id')->constrained();

            // $table->unsignedBigInteger('service_id');
            // $table->foreignId('service_id')->references('id')->on('services');

            // FUNZIONA QUESTA FORMA ABBREVIATA
            $table->foreignId('service_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_service');
    }
}
