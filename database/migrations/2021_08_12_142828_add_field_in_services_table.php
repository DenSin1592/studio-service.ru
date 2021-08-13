<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldInServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('header_block_background_image')->nullable();
            $table->string('image_right_from_header')->nullable();
            $table->text('achievements_block')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('achievements_block');
            $table->dropColumn('image_right_from_header');
            $table->dropColumn('header_block_background_image');
        });
    }
}
