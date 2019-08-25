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
      $table->decimal('price');
      $table->decimal('accounting_price');
      $table->integer('supplier_id');
      $table->string('description');
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
    Schema::dropIfExists('costs');
  }
}
