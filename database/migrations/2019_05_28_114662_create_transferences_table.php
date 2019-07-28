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
            $table->string('ttn_id');
            $table->date('date')->nullable();
            $table->biginteger('product_id')->nullable();
            $table->integer('quantity');
            $table->biginteger('unit_id')->nullable();
            $table->decimal('price');
            $table->decimal('accounting_price');
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
        Schema::dropIfExists('transferences');
    }
}
