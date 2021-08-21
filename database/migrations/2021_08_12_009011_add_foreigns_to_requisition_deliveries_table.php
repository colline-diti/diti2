<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToRequisitionDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisition_deliveries', function (Blueprint $table) {
            $table
                ->foreign('requisition_item_id')
                ->references('id')
                ->on('requisition_items')
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
        Schema::table('requisition_deliveries', function (Blueprint $table) {
            $table->dropForeign(['requisition_item_id']);
        });
    }
}
