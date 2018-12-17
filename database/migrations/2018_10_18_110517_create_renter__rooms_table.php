<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenterRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RenterRooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('renter_id');
            $table->integer('room_id');
            $table->date('allotment_date');
            $table->tinyinteger('added_by');
            $table->datetime('added_on');
            $table->tinyinteger('updated_by')->nullable();
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
        Schema::dropIfExists('renter__rooms');
    }
}
