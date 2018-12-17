<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_number');
            $table->string('room_type');
            $table->integer('beds');
            $table->integer('rent');
            $table->integer('added_by');
            $table->datetime('added_on');
            $table->integer('updated_by')->nullable();
            $table->datetime('updated_on')->nullable();
            $table->tinyinteger('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
