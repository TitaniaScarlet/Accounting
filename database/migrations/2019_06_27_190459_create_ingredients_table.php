<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->biginteger('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->biginteger('unit_id')->nullable();
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
      Schema::table('ingredients', function (Blueprint $table) {
        $table->dropForeign('ingredients_category_id_foreign');
        $table->dropForeign('ingredients_menu_id_foreign');
    });
        Schema::dropIfExists('ingredients');
    }
}
