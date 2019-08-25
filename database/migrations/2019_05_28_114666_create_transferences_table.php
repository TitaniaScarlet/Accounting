<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('ttnproduct_id')->unsigned();
            $table->foreign('ttnproduct_id')->references('id')->on('ttnproducts')->onDelete('cascade');
            $table->date('date');
            $table->integer('quantity');
            $table->biginteger('unit_id');
            $table->decimal('accounting_price');
            $table->decimal('accounting_sum');
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
      Schema::table('transferences', function (Blueprint $table) {
          $table->dropForeign('transferences_ttnproduct_id_foreign');
      });
        Schema::dropIfExists('transferences');
    }
}
