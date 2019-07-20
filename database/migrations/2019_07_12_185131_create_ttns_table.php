<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTtnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ttns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number')->unique();
            $table->date('date');
            $table->decimal('sum');
            $table->decimal('vat_sum');
            $table->decimal('accounting_sum');
            $table->integer('supplier_id');
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
        Schema::dropIfExists('ttns');
    }
}
