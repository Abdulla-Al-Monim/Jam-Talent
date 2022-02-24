<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_type')->comment('1 for custom offer 2 for task');
            $table->string('order_id');
            $table->integer('offer_id');
            $table->integer('freelancer_id');
            $table->integer('employer_id');
            $table->string('budget');
            $table->integer('delivery_type')->default(0)->comment('1 for day 0 for hour ')->nullable();
            $table->integer('status')->default(1)->comment('1 for active order 2 for Deliverd 3 for revision 4 for complete 5 for cancel request 6 for cancel')->nullable();
            $table->integer('delivary_time')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
