<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInOurWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('our_works', function (Blueprint $table) {
            $table->text('content_after_slider')->nullable()->after('description');
            $table->renameColumn('description', 'content_before_slider');
        });

        Schema::table('our_work_images', function (Blueprint $table) {
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
        Schema::table('our_works', function (Blueprint $table) {
            $table->dropColumn('content_after_slider');
            $table->renameColumn('content_before_slider', 'description');
        });
        Schema::table('our_work_images', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
}
