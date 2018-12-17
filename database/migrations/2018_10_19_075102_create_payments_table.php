<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('renter_id');
            $table->integer('payment');
            $table->date('date');
            $table->tinyinteger('payment_status')->default('0');
            $table->integer('added_by');
            $table->datetime('added_on');
            $table->integer('updated_by');
            $table->datetime('updated_on');
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
        Schema::dropIfExists('payments');
    }
}
