<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id');
            $table->integer('freelancer_id');
            $table->integer('employer_id');
            $table->string('min_budget');
            $table->string('file')->nullable();
            $table->integer('delivery_type')->default(0)->comment('1 for day 0 for hour ');
            $table->integer('status')->default(0)->comment('1 for active 0 for en-active');
            $table->integer('delivary_time');
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
        Schema::dropIfExists('task_applies');
    }
}
