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
            $table->string('item_name');
            $table->integer('quantity');
            $table->string('dateofDelivery');
            $table->string('status')->default('Pending');
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
