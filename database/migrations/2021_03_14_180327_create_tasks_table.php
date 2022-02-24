<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id')->nullable();
            $table->integer('freelancer_id')->nullable();
            $table->string('task_name');
            $table->string('category_name');
            $table->string('location');
            $table->integer('budget_type')->comment('1 for fixed 2 for hourly ');
            $table->integer('delivery_time');
            $table->string('min_budget');
            $table->string('max_budget');
            $table->text('description');
            $table->string('file')->nullable();
            $table->integer('status')->default(0)->comment('1 for active 0 for en-active ');
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
        Schema::dropIfExists('tasks');
    }
}
