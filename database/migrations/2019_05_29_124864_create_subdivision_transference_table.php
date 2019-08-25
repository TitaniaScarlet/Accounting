<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubdivisionTransferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdivision_transference', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('subdivision_id')->unsigned();
            $table->foreign('subdivision_id')->references('id')->on('subdivisions')->onDelete('cascade');
            $table->biginteger('transference_id')->unsigned();
            $table->foreign('transference_id')->references('id')->on('transferences')->onDelete('cascade');
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
      Schema::table('subdivision_transference', function (Blueprint $table) {
          $table->dropForeign('subdivision_transference_subdivision_id_foreign');
          $table->dropForeign('subdivision_transference_transference_id_foreign');
      });
        Schema::dropIfExists('subdivision_transference');
    }
}
