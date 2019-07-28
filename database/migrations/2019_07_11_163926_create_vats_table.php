<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVatsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('vats', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->date('date');
      $table->integer('vat_rate');
      $table->decimal('vat_input')->nullable();
      $table->decimal('vat_output')->nullable();
      $table->integer('vatable_id');
      $table->string('vatable_type');
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
    Schema::dropIfExists('vats');
  }
}
