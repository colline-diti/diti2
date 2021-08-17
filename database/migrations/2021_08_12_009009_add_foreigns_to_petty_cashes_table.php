<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToPettyCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petty_cashes', function (Blueprint $table) {
            $table
                ->foreign('expeses_resturant_id')
                ->references('id')
                ->on('expeses_resturants')
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
        Schema::table('petty_cashes', function (Blueprint $table) {
            $table->dropForeign(['expeses_resturant_id']);
        });
    }
}
