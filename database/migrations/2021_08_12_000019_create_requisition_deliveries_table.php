<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_quantity');
            $table->date('delivery_date');
            $table->string('remarks');
            $table->unsignedBigInteger('requisition_item_id');

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
        Schema::dropIfExists('requisition_deliveries');
    }
}
