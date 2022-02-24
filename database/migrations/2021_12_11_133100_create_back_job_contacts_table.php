<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackJobContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_job_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('contact_reason');
            $table->string('interest_type_of');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('position')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('office_address')->nullable();
            $table->string('email')->nullable();
            $table->string('website_url_address')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('behance_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('whatsapp_messaging_number')->nullable();
            $table->text('cover_letter')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('back_job_contacts');
    }
}
