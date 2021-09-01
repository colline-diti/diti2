<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToStockDischargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_discharges', function (Blueprint $table) {
            $table
                ->foreign('stock_table_id')
                ->references('id')
                ->on('stock_tables')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('res_section_id')
                ->references('id')
                ->on('res_sections')
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
        Schema::table('stock_discharges', function (Blueprint $table) {
            $table->dropForeign(['stock_table_id']);
            $table->dropForeign(['res_section_id']);
        });
    }
}
