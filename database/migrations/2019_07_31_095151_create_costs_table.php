<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('costs', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('number')->nullable();
      $table->date('date');
      $table->decimal('accounting_sum');
      $table->integer('vat_rate');
      $table->decimal('vat_sum');
      $table->decimal('sum');
      $table->integer('supplier_id');
      $table->string('description');
      $table->biginteger('ttn_id')->unsigned();
      $table->foreign('ttn_id')->references('id')->on('ttns')->onDelete('cascade');
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
    Schema::table('distributions', function (Blueprint $table) {
        $table->dropForeign('costs_ttn_id_foreign');
    });
    Schema::dropIfExists('costs');
  }
}
