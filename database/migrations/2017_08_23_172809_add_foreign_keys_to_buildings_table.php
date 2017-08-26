<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('buildings', function (Blueprint $table) {
          $table->foreign('settlement_id')->references('id')->on('settlements')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('settler_id')->references('id')->on('settlers')->onUpdate('cascade')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('buildings', function (Blueprint $table) {
        $table->dropForeign(['settlement_id']);
        $table->dropForeign(['settler_id']);
      });
    }
}
