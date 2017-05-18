<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table) {
           $table->increments('id');
           $table->string('title');
           $table->dateTime('start');
           $table->dateTime('end');
           $table->text('description');
           $table->integer('max_volunteer')->unsigned();
           $table->integer('num_registered_volunteers')->unsigned()->default(0);
           $table->decimal('Lat', 10, 7);
           $table->decimal('Lon', 10, 7);
           $table->text('address_street');
           $table->text('address_city');
           $table->text('address_state');
           $table->integer('address_zip');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
