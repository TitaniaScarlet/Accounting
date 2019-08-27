<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('cost_id')->unsigned();
            $table->foreign('cost_id')->references('id')->on('costs')->onDelete('cascade');
            $table->biginteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
      Schema::table('cost_item', function (Blueprint $table) {
          $table->dropForeign('cost_item_cost_id_foreign');
          $table->dropForeign('cost_item_item_id_foreign');
      });
        Schema::dropIfExists('cost_item');
    }
}
