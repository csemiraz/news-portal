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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('news_ticker_total');
            $table->string('news_ticker_status');
            $table->string('logo');
            $table->string('favicon');
            $table->string('top_bar_date_status');
            $table->string('top_bar_email');
            $table->string('top_bar_email_status');
            $table->string('theme_color_1');
            $table->string('theme_color_2');
            $table->string('analytic_id');
            $table->string('analytic_status');
            $table->string('disqus_code');
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
        Schema::dropIfExists('settings');
    }
};
