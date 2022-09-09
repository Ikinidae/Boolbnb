<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsSponsorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments_sponsorships', function (Blueprint $table) {
            $table->unsignedBigInteger('apartment_id');
            $table->foreignId('apartment_id')->references('id')->on('apartments');

            $table->unsignedBigInteger('sponsorship_id');
            $table->foreignId('sponsorship_id')->references('id')->on('sponsorships');

            $table->date('expire_date');
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
        Schema::dropIfExists('apartments_sponsorships');
    }
}
