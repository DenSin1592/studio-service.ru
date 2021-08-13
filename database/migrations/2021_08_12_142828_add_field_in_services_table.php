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
            $table->string('section_tasks_name')->nullable();
            $table->boolean('section_tasks_publish')->default(false);
        });



        Schema::create('service_content_blocks', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('image_right')->default(false);
            $table->unsignedInteger('service_id')->nullable();

            $table->foreign('service_id', 'content_service_fk')->references('id')->on('services');

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
        Schema::dropIfExists('service_content_blocks');

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('section_tasks_name');
            $table->dropColumn('section_tasks_publish');
            $table->dropColumn('achievements_block');
            $table->dropColumn('image_right_from_header');
            $table->dropColumn('header_block_background_image');
        });
    }
}
