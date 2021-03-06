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
            $table->string('section_video_name')->nullable();
            $table->string('section_video_link_youtube')->nullable();
            $table->boolean('section_video_publish')->default(false);
            $table->string('section_video_image')->nullable();
            $table->string('section_tabs_name')->nullable();
            $table->string('section_tabs_description')->nullable();
            $table->boolean('section_tabs_publish')->default(false);
            $table->string('section_requirements_name')->nullable();
            $table->text('section_requirements_content')->nullable();
            $table->boolean('section_requirements_publish')->default(false);
            $table->string('section_faq_name')->nullable();
            $table->boolean('section_faq_publish')->default(false);
            $table->string('section_prices_name')->nullable();
            $table->text('section_prices_content')->nullable();
            $table->boolean('section_prices_publish')->default(false);
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

        Schema::create('service_tabs_block_tabs', function (Blueprint $table) {
            $table->id();

            $table->string('tab_name')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->text('content')->nullable();
            $table->unsignedInteger('service_id')->nullable();

            $table->foreign('service_id', 'tab_service_fk')->references('id')->on('services');

            $table->timestamps();
        });

        Schema::create('service_faq_questions', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('service_id')->nullable();

            $table->foreign('service_id', 'faq_service_fk')->references('id')->on('services');

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
        Schema::dropIfExists('service_faq_questions');

        Schema::dropIfExists('service_tabs_block_tabs');

        Schema::dropIfExists('service_content_blocks');

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('section_prices_name');
            $table->dropColumn('section_prices_content');
            $table->dropColumn('section_prices_publish');
            $table->dropColumn('section_faq_name');
            $table->dropColumn('section_faq_publish');
            $table->dropColumn('section_requirements_name');
            $table->dropColumn('section_requirements_content');
            $table->dropColumn('section_requirements_publish');
            $table->dropColumn('section_tabs_name');
            $table->dropColumn('section_tabs_description');
            $table->dropColumn('section_tabs_publish');
            $table->dropColumn('section_video_image');
            $table->dropColumn('section_video_name');
            $table->dropColumn('section_video_link_youtube');
            $table->dropColumn('section_video_publish');
            $table->dropColumn('section_tasks_name');
            $table->dropColumn('section_tasks_publish');
            $table->dropColumn('achievements_block');
            $table->dropColumn('image_right_from_header');
            $table->dropColumn('header_block_background_image');
        });
    }
}
