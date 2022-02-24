<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('total_review')->default(0)->nullable();
            $table->integer('total_rating')->default(0)->nullable();
            $table->float('average_rating',9, 2)->default(0)->nullable();
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
        Schema::dropIfExists('employer_activities');
    }
}
