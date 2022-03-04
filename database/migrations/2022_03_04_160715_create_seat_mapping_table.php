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
        Schema::create('seat_mapping', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('seat_id')->unsigned();
            $table->foreign('seat_id')->references('id')->on('seats')
                ->onDelete('cascade');

            $table->integer('booking_id')->unsigned();
            $table->foreign('booking_id')->references('id')->on('booking')
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
        Schema::dropIfExists('seat_mapping');
    }
};
