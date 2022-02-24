<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_employers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freelancer_id');
            $table->integer('user_id');
            $table->integer('order_id');
            $table->integer('rating')->nullable()->comment('1 for 1-stat 2 for 2-stat 3 for 3-star 4 for 4-star 5 for 5-star');
            $table->text('comment')->nullable();
            $table->integer('status')->default(0)->comment('0 for en-complete 1 for complete');
            
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
        Schema::dropIfExists('review_employers');
    }
}
