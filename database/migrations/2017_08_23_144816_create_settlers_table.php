<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('settlers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('fitness');
          $table->integer('charm');
          $table->integer('creativity');
          $table->integer('logic');
          $table->integer('skill');
          $table->integer('knowledge');
          $table->integer('health');
          $table->integer('happiness')->nullable();
          $table->integer('children')->nullable();
          $table->integer('married_to')->unsigned()->nullable();
          $table->integer('settlement_id')->unsigned();
          $table->integer('job_id')->unsigned()->nullable();
          $table->integer('job_step')->nullable();
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
      Schema::dropIfExists('settlers');
    }
}
