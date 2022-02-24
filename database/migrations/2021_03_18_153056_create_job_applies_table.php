<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('freelancer_id');
            $table->integer('employer_id');
            $table->string('name');
            $table->string('email');
            $table->string('file')->nullable();
            $table->integer('budget');
            $table->integer('status')->defaut(0)->comment('0 for pending approval 1 for confirm');
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
        Schema::dropIfExists('job_applies');
    }
}
