<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freelancer_id');
            $table->integer('employer_id');
            $table->string('email');
            $table->string('title');
            $table->text('message');
            $table->string('file')->nullable();
            $table->integer('status')->default(0)->comment('1 for active 0 for en-active');
            $table->string('budget');
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
        Schema::dropIfExists('task_offers');
    }
}
