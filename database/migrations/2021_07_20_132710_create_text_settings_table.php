<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_text_t')->nullable();
            $table->string('sub_title_text_t')->nullable();
            $table->string('title_text_e')->nullable();
            $table->string('sub_title_text_e')->nullable();
            $table->string('title_text_c')->nullable();
            $table->string('sub_title_text_c')->nullable();
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
        Schema::dropIfExists('text_settings');
    }
}
