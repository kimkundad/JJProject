<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name_pro')->nullable();
            $table->string('code_pro')->nullable();
            $table->integer('cat_id');
            $table->integer('price');
            $table->string('image_pro')->nullable();
            $table->text('detail')->nullable();
            $table->integer('view')->default('0');
            $table->integer('status')->default('0');
            $table->integer('rating')->default('0');
            $table->integer('stock')->default('0');
            $table->integer('shipping_price')->default('0');
            $table->integer('total')->default('0');
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
