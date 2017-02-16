<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_name');
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('user_photo')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_address')->nullable();
            $table->integer('department_id')->references('department_id')->on('department')->nullable();
            $table->integer('city_id')->references('city_id')->on('city')->nullable();
            $table->integer('company_id')->references('company_id')->on('cpmpany')->nullable();
            $table->string('user_email')->unique();
            $table->string('user_password');
            $table->integer('role_id')->references('role_id')->on('role');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
