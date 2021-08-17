<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAssetsAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assets_accounts', function (Blueprint $table) {
            $table
                ->foreign('asset_types_id')
                ->references('id')
                ->on('asset_types')
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
        Schema::table('assets_accounts', function (Blueprint $table) {
            $table->dropForeign(['asset_types_id']);
        });
    }
}
