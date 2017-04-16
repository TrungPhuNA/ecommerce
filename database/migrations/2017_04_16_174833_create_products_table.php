<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('category_id')->default(0)->nullable();
            $table->integer('productimg_id')->default(0)->nullable();
            $table->integer('producer_id')->default(0)->nullable();
            $table->integer('price')->default(0)->nullable();
            $table->integer('number')->default(0)->nullable();
            $table->tinyInteger('sale')->default(0)->nullable();
            $table->string('thunbar')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('hot')->unsigned()->default(0)->nullable();
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
         Schema::dropIfExists('products');
    }
}
