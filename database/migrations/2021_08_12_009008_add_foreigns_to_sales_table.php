<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table
                ->foreign('clients_id')
                ->references('id')
                ->on('clients')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('payment_types_id')
                ->references('id')
                ->on('payment_types')
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
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['clients_id']);
            $table->dropForeign(['payment_types_id']);
        });
    }
}
