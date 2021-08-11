<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYoutubeLinkAboutInHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->string('youtube_link_about')->nullable();
            $table->string('link_about')->nullable();
            $table->text('short_about')->nullable();
            $table->text('description_after_header')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn('youtube_link_about');
            $table->dropColumn('link_about');
            $table->dropColumn('short_about');
            $table->dropColumn('description_after_header');
        });
    }
}
