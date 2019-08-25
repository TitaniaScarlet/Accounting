<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('transference_id');
            $table->biginteger('cost_id')->unsigned();
            $table->foreign('cost_id')->references('id')->on('costs')->onDelete('cascade');
            $table->decimal('distribution_sum');
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
          $table->dropForeign('distributions_cost_id_foreign');
      });
        Schema::dropIfExists('distributions');
    }
}
