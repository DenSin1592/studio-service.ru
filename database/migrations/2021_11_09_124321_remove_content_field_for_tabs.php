<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveContentFieldForTabs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offer_tabs_blocks', function (Blueprint $table){
            $table->dropColumn('content');
        });

        Schema::table('service_tabs_block_tabs', function (Blueprint $table){
            $table->dropColumn('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_tabs_block_tabs', function (Blueprint $table){
            $table->text('content')->nullable();
        });

        Schema::table('offer_tabs_blocks', function (Blueprint $table){
            $table->text('content')->nullable();
        });
    }
}
