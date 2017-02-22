<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanycustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companycustomer', function (Blueprint $table) {
            $table->increments('companycustomer_id');
            $table->integer('company_id')->references('company_id')->on('company')->nullable();
            $table->integer('customer_id')->references('customer_id')->on('customer')->nullable();
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
        Schema::dropIfExists('companycustomer');
    }
}
