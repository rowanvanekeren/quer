<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('location')->nullable();
            $table->string('city')->nullable();
            $table->string('url')->nullable();
            $table->dateTime('date_start_sell')->nullable();
            $table->dateTime('date_event')->nullable();
            $table->string('image')->nullable();
            $table->string('tags')->nullable();
            $table->int('categorie_id')->index();
            $table->int('code');
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
        //
    }
}
