<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->string('plan_name_ar')->nullable();
            $table->string('plan_name_tr')->nullable();
            $table->integer('Billed');
            $table->string('rate');
            $table->text('s_desc')->nullable();
            $table->text('s_desc_ar')->nullable();
            $table->text('s_desc_tr')->nullable();
            $table->text('desc')->nullable();
            $table->text('desc_ar')->nullable();
            $table->text('desc_tr')->nullable();
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
        Schema::dropIfExists('membership_plans');
    }
}
