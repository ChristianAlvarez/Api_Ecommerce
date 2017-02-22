<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_name');
            $table->string('company_phone')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_logo')->nullable();
            $table->integer('department_id')->references('department_id')->on('department')->nullable();
            $table->integer('city_id')->references('city_id')->on('city')->nullable();
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
        Schema::dropIfExists('company');
    }
}
