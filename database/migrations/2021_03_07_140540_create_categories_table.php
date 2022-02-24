<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('name_ar')->nullable()->unique();
            $table->string('name_tr')->nullable()->unique();
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('desc')->nullable();
            $table->text('desc_ar')->nullable();
            $table->text('desc_tr')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('featured')->default(0)->comment('1 for fetured');
            $table->integer('popular')->default(0)->comment('1 for popular');
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
        Schema::dropIfExists('categories');
    }
}
