<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToResSalesTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('res_sales_tables', function (Blueprint $table) {
            $table
                ->foreign('res_product_id')
                ->references('id')
                ->on('res_products')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('res_sales_tables', function (Blueprint $table) {
            $table->dropForeign(['res_product_id']);
        });
    }
}
