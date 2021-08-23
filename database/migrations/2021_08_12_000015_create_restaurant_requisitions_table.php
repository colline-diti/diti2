<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_requisitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('requisition_code');
            $table->string('status')->default('Pending');
            $table->string('delivery_status')->default('Not Delivered');
            $table->string('Particulars');

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
        Schema::dropIfExists('restaurant_requisitions');
    }
}
