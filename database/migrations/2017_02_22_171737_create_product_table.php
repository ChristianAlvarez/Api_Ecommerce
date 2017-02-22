<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_description');
            $table->string('product_barcode');
            $table->decimal('product_price');
            $table->string('product_image')->nullable();
            $table->string('product_remarks')->nullable();
            $table->double('product_stock')->nullable();
            $table->integer('company_id')->references('company_id')->on('company')->nullable();
            $table->integer('category_id')->references('category_id')->on('category')->nullable();
            $table->integer('tax_id')->references('tax_id')->on('tax')->nullable();
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
        Schema::dropIfExists('product');
    }
}
