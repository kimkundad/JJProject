<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name_order')->nullable();
            $table->string('lastname_order')->nullable();
            $table->string('email_order')->nullable();
            $table->string('telephone_order')->nullable();
            $table->string('country_order')->nullable();
            $table->string('postal_code_order')->nullable();
            $table->string('discount')->nullable();
            $table->text('street_order')->nullable();
            $table->integer('order_status')->default('0');
            $table->float('total', 8, 2);
            $table->float('shipping_price', 8, 2);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
