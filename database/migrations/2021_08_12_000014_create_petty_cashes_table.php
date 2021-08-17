<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePettyCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petty_cashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('details');
            $table->integer('debit');
            $table->integer('credit');
            $table->unsignedBigInteger('expeses_resturant_id');

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
        Schema::dropIfExists('petty_cashes');
    }
}
