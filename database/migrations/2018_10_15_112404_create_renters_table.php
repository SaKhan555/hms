<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','20');
            $table->string('father_name','20');
            $table->string('nic_number','15');
            $table->string('contact','15');
            $table->string('email','50')->nullable();
            $table->string('address','100');
            $table->tinyinteger('gender');
            $table->string('marital_status','20');
            $table->date('dob');
            $table->string('profession','100');
            $table->string('photo_url','100')->nullable();
            $table->string('nic_copy','100')->nullable();
            $table->text('other_details')->nullable();
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
        Schema::dropIfExists('renters');
    }
}
