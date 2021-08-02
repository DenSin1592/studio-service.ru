<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteFieldsContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_audience_pages', function (Blueprint $table) {
            $table->dropColumn('content');
        });
        Schema::table('competence_pages', function (Blueprint $table) {
            $table->text('content_top');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competence_pages', function (Blueprint $table) {
            $table->dropColumn('content_top');
        });
        Schema::table('target_audience_pages', function (Blueprint $table) {
            $table->text('content')->nullable();
        });
    }
}
