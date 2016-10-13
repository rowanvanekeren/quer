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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('country');
            $table->string('city');
            $table->string('postal_code');
            $table->string('street');
            $table->string('house_number');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('is_admin');
            $table->string('image')->nullable();
            $table->tinyInteger('active');
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
        Schema::drop('users');
    }
}
