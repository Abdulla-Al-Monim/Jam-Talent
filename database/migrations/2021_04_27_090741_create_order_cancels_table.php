<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCancelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cancels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('freelancer_id');
            $table->integer('employer_id');
            $table->text('message');
            $table->integer('status')->default(0)->comment('0 for en active 1 for active');
            $table->integer('cancel_request')->comment('1 for frelancer 2 employer');
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
        Schema::dropIfExists('order_cancels');
    }
}
