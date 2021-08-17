<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asset_name');
            $table->integer('quantity');
            $table->string('supplier');
            $table->decimal('price');
            $table->unsignedBigInteger('asset_types_id');

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
        Schema::dropIfExists('assets_accounts');
    }
}
