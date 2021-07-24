<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->default('0');
            $table->string('name')->nullable();
            $table->text('detail')->nullable();
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->integer('view')->default('0');
            $table->integer('rating')->default('0');
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('line_id')->nullable();
            $table->string('email')->nullable();
            $table->string('youtube')->nullable();
            $table->string('website')->nullable();
            $table->text('timeline')->nullable();
            $table->integer('startprice')->default('0');
            $table->integer('endprice')->default('0');
            $table->text('keyword')->nullable();
            $table->integer('first')->default('0');
            $table->integer('member')->default('0');
            $table->integer('priority')->default('0');
            $table->text('detail_en')->nullable();
            $table->text('detail_cn')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('shops');
    }
}
