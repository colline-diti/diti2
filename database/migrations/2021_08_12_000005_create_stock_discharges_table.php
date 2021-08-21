<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockDischargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_discharges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quantity_issued');
            $table->unsignedBigInteger('stock_table_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('res_section_id');
            $table->date('return_date');
            $table->text('remarks');
            $table->string('issued_by');
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('stock_discharges');
    }
}
