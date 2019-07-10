<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTransferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_transference', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('supplier_id')->unsigned();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
      Schema::table('supplier_transference', function (Blueprint $table) {
          $table->dropForeign('supplier_transference_supplier_id_foreign');
          $table->dropForeign('supplier_transference_transference_id_foreign');
      });
        Schema::dropIfExists('supplier_transference');
    }
}
