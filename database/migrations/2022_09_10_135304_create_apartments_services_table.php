<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments_services', function (Blueprint $table) {
            // QUESTA FORMA NON FUNZIONA
            // $table->unsignedBigInteger('apartment_id');
            // $table->foreignId('apartment_id')->references('id')->on('apartments');

            // FUNZIONA QUESTA FORMA ABBREVIATA
            $table->foreignId('apartment_id')->constrained();

            // $table->unsignedBigInteger('service_id');
            // $table->foreignId('service_id')->references('id')->on('services');

            // FUNZIONA QUESTA FORMA ABBREVIATA
            $table->foreignId('service_id')->constrained();
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
        Schema::dropIfExists('apartments_services');
    }
}
