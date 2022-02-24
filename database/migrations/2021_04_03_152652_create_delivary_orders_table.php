<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelivaryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivary_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freelancer_id');
            $table->integer('employer_id');
            $table->integer('order_id')->unsigned();
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->integer('revision')->nullable();
            $table->timestamps();
            //$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivary_orders');
    }
}
