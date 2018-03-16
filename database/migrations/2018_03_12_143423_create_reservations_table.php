<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('contact');
            $table->integer('box_id')->references('id')->on('boxes')->onDelete('cascade');
            $table->integer('pass_id')->references('id')->on('passes')->onDelete('cascade');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('postalcode');
            $table->text('comment')->nullable();
            $table->dateTime('reserved');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->boolean('paid')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('reservations');
    }
}
