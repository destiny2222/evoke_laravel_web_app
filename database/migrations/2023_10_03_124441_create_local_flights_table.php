<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_flights', function (Blueprint $table) {
            $table->id();
            $table->string('airport_location_from');
            $table->string('airport_location_to');
            $table->date('flight_date');
            $table->date('flight_return_date');
            $table->string('flight_class');
            $table->time('flight_time');
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('number_passenger');
            $table->string('passenger_name');
            $table->string('baggage_weight');
            $table->string('passenger_title');
            $table->string('passenger_fname_onpassport');
            $table->string('passenger_lastname_onpassport');
            $table->string('passenger_gender_onpassport');
            $table->date('date_of_birth');
            $table->string('passenger_email');
            $table->string('passenger_phone');
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
        Schema::dropIfExists('local_flights');
    }
};
