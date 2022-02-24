<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_freelancers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('employer_id');
            $table->integer('order_id');
            $table->integer('on_budget')->nullable()->comment('0 for no 1 for yes');
            $table->integer('on_time')->nullable()->comment('0 for no 1 for yes');
            $table->integer('rating')->nullable()->comment('0 for 1 stat 1 for 2-star 3 for 3-star 4 for 4-star 5 for five star');
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
        Schema::dropIfExists('review_freelancers');
    }
}
