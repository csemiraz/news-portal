<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('about_title');
            $table->text('about_detail');
            $table->string('about_status');
            $table->string('faq_title');
            $table->text('faq_detail')->nullable();
            $table->string('faq_status');
            $table->string('contact_title');
            $table->text('contact_detail')->nullable();
            $table->text('contact_map');
            $table->string('contact_status');
            $table->string('terms_title');
            $table->text('terms_detail');
            $table->string('terms_status');
            $table->string('privacy_title');
            $table->text('privacy_detail');
            $table->string('privacy_status');
            $table->string('disclaimer_title');
            $table->text('disclaimer_detail');
            $table->string('disclaimer_status');
            $table->string('login_title');
            $table->string('login_status');
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
        Schema::dropIfExists('pages');
    }
};
