<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnHomePageInTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competencies', function (Blueprint $table) {
                $table->boolean('on_home_page')->after('publish')->default(false);
        });
        Schema::table('our_works', function (Blueprint $table) {
            $table->boolean('on_home_page')->after('publish')->default(false);
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->boolean('on_home_page')->after('publish')->default(false);
        });
        Schema::table('services', function (Blueprint $table) {
            $table->boolean('on_home_page')->after('publish')->default(false);
        });
        Schema::table('target_audiences', function (Blueprint $table) {
            $table->boolean('on_home_page')->after('publish')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competencies', function (Blueprint $table) {
            $table->dropColumn('on_home_page');
        });
        Schema::table('our_works', function (Blueprint $table) {
            $table->dropColumn('on_home_page');
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('on_home_page');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('on_home_page');
        });
        Schema::table('target_audiences', function (Blueprint $table) {
            $table->dropColumn('on_home_page');
        });
    }
}
