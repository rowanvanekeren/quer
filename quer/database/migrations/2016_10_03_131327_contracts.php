<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quer_id')->index();
            $table->integer('applicant_id')->index()->nullable();
            $table->string('attachment')->nullable();
            $table->decimal('price', 18, 4);
            $table->tinyInteger('phase_id')->index();
            $table->integer('advertisement_id')->index();
            $table->tinyInteger('active');
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
