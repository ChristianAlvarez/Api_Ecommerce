<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_username');
            $table->string('customer_firstname');
            $table->string('customer_lastname');
            $table->string('customer_photo')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_latitude')->nullable();
            $table->string('customer_longitude')->nullable();
            $table->integer('department_id')->references('department_id')->on('department')->nullable();
            $table->integer('city_id')->references('city_id')->on('city')->nullable();
            $table->boolean('IsUpdated');
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
        Schema::dropIfExists('customer');
    }
}
