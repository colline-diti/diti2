<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpesesResturantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expeses_resturants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('particulars');
            $table->integer('quantity');
            $table->integer('rate');
            $table->integer('ammount');

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
        Schema::dropIfExists('expeses_resturants');
    }
}
