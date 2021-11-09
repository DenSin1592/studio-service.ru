<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabsContentBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabs_content_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('blockable_id');
            $table->string('blockable_type');
            $table->boolean('publish')->default(false);
            $table->integer('position')->default(0);

           /* $table->foreign('blockable_id', 'tabs_content_blocks_offer_tabs_blocks-fk')->references('id')->on('offer_tabs_blocks');
            $table->foreign('blockable_id', 'service_tabs_block_tabs_offer_tabs_blocks-fk')->references('id')->on('service_tabs_block_tabs');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::table('tabs_content_blocks', function (Blueprint $table) {
            $table->dropForeign('tabs_content_blocks-offer_tabs_blocks-fk');
            $table->dropForeign('service_tabs_block_tabs-offer_tabs_blocks-fk');
        });*/

        Schema::dropIfExists('tabs_content_blocks');
    }
}
