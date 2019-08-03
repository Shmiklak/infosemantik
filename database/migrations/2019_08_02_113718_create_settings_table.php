<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('price_list');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('bot');
            $table->string('email');
            $table->string('address');
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('logo');
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
        Schema::dropIfExists('settings');
    }
}
