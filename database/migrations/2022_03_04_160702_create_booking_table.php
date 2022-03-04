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
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seat_numbers');
            $table->decimal('total_price', $precision = 8, $scale = 2);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('source_station_id')->unsigned();
            $table->foreign('source_station_id')->references('id')->on('stations')
                ->onDelete('cascade');

            $table->integer('destination_station_id')->unsigned();
            $table->foreign('destination_station_id')->references('id')->on('stations')
                ->onDelete('cascade');

            $table->integer('trip_id')->unsigned();
            $table->foreign('trip_id')->references('id')->on('trip')
                ->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('booking');
    }
};
