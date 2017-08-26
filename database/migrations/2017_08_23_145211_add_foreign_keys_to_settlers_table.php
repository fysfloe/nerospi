<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToSettlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('settlers', function (Blueprint $table) {
          $table->foreign('married_to')->references('id')->on('settlers')->onUpdate('cascade');
          $table->foreign('settlement_id')->references('id')->on('settlements')->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('job_id')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('settlers', function (Blueprint $table) {
        $table->dropForeign(['married_to']);
        $table->dropForeign(['settlement_id']);
        $table->dropForeign(['job_id']);
      });
    }
}
