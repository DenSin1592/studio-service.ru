<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsPagesAndOurWorkPagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_work_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('node_id');
            $table->foreign('node_id')->references('id')->on('nodes');

            $table->string('header')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('review_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('node_id');
            $table->foreign('node_id')->references('id')->on('nodes');

            $table->string('header')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('review_pages');
        Schema::dropIfExists('our_work_pages');
    }
}
