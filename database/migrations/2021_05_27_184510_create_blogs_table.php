<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('user_id');
            $table->string('type');
            $table->string('slug');
            $table->text('image');
            $table->text('image_related');
            $table->text('image_single');
            $table->text('s_desc')->nullable();
            $table->text('desc')->nullable();
            $table->integer('featured')->default(0)->comment('1 for fetured');
            $table->integer('status')->default(0)->comment('1 for active 0 for en-active');
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
        Schema::dropIfExists('blogs');
    }
}
