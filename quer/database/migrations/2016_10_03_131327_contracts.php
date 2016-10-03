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
        $table->int('quer_id')->index();
        $table->int('applicant_id')->index()->nullable();
        $table->string('attachment')->nullable();
        $table->decimal('price', 18, 4);
        $table->int('phase_id')->index();
        $table->int('advertisement_id')->index();
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
