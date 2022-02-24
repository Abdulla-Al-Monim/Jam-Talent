<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_checkouts', function (Blueprint $table) {
            $table->id();
            $table->integer('freelancer_id');
            $table->integer('employer_id');
            $table->string('transaction_id')->nullable();
            $table->string('budget');
            $table->integer('job_id')->nullable();
            $table->integer('task_id')->nullable();
            $table->integer('order_type')->comment('1 for custom offer 2 for task 3 for job');
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
        Schema::dropIfExists('order_checkouts');
    }
}
