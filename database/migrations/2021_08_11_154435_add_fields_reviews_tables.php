<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsReviewsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('preview_image')->nullable();
        });

        Schema::table('review_images', function (Blueprint $table) {
            $table->string('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('review_images', function (Blueprint $table) {
            $table->dropColumn('name')->nullable();
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('preview_image');
        });
    }
}
