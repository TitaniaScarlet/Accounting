<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTtnproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ttnproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('ttn_id')->unsigned();
            $table->foreign('ttn_id')->references('id')->on('ttns')->onDelete('cascade');
            $table->biginteger('product_id')->nullable();
            $table->integer('quantity');
            $table->biginteger('unit_id')->nullable();
            $table->decimal('accounting_price');
            $table->decimal('accounting_sum');
            $table->integer('vat_rate');
            $table->decimal('vat_sum');
            $table->decimal('sum');
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
      Schema::table('ttnproducts', function (Blueprint $table) {
          $table->dropForeign('ttnproducts_ttn_id_foreign');
      });
        Schema::dropIfExists('ttnproducts');
    }
}
