<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWhiteTextInTabsContentBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabs_content_blocks', function (Blueprint $table) {
            $table->boolean('white_text')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabs_content_blocks', function (Blueprint $table) {
            $table->dropColumn('white_text');
        });
    }
}
