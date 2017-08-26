<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('buildings', function (Blueprint $table) {
          $table->increments('id');
          $table->string('type');
          $table->string('name');
          $table->integer('gains')->nullable();
          $table->integer('stability');
          $table->integer('settler_id')->unsigned()->nullable();
          $table->integer('settlement_id')->unsigned();
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
      Schema::dropIfExists('buildings');
    }
}
