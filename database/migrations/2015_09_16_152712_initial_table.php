<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hour');
            $table->integer('price');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('booking_history', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('pickup_time');
            $table->dateTime('return_time');
            $table->integer('quantity');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->integer('price');
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
        Schema::drop('pricing');
        Schema::drop('booking_history');
    }
}
