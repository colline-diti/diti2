<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name');
            $table->bigInteger('quantity');
            $table->unsignedBigInteger('item_category_id');
            $table->unsignedBigInteger('unit_id');
            $table->text('remarks');

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
        Schema::dropIfExists('stock_tables');
    }
}
