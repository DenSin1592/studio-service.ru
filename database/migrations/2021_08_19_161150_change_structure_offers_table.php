<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStructureOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
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
            $table->text('section_advantages_content')->nullable();
            $table->boolean('section_advantages_publish')->default(false);
            $table->string('section_feedback_name')->nullable();
            $table->boolean('section_feedback_publish')->default(false);
            $table->string('section_competencies_name')->nullable();
            $table->boolean('section_competencies_publish')->default(false);
            $table->string('section_offers_name')->nullable();
            $table->boolean('section_offers_publish')->default(false);
            $table->boolean('section_reviews_publish')->default(false);
            $table->boolean('section_projects_publish')->default(false);
        });


        Schema::create('offer_content_blocks', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('image_right')->default(false);
            $table->unsignedInteger('offer_id')->nullable();

            $table->foreign('offer_id', 'content_offer_fk')->references('id')->on('offers');

            $table->timestamps();
        });


        Schema::create('offer_tabs_blocks', function (Blueprint $table) {
            $table->id();

            $table->string('tab_name')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->text('content')->nullable();
            $table->unsignedInteger('offer_id')->nullable();

            $table->foreign('offer_id', 'tab_offer_fk')->references('id')->on('offers');

            $table->timestamps();
        });


        Schema::create('offer_faq_questions', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('offer_id')->nullable();

            $table->foreign('offer_id', 'faq_offer_fk')->references('id')->on('offers');

            $table->timestamps();
        });

        Schema::create('before_after_image_offer', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();

            $table->unsignedInteger('before_after_image_id');
            $table->unsignedInteger('offer_id');
            $table->integer('position')->default(0);
            $table->foreign('before_after_image_id', 'before_after_image_to_offer_fk')->references('id')->on('before_after_images');
            $table->foreign('offer_id', 'offer_to_before_after_image_fk')->references('id')->on('offers');
            $table->unique(['before_after_image_id', 'offer_id'], 'before_after_image_offer_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('before_after_image_offer');
        Schema::dropIfExists('offer_faq_questions');
        Schema::dropIfExists('offer_tabs_blocks');
        Schema::dropIfExists('offer_content_blocks');

        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('header_block_background_image');
            $table->dropColumn('image_right_from_header');
            $table->dropColumn('achievements_block');
            $table->dropColumn('section_tasks_name');
            $table->dropColumn('section_tasks_publish');
            $table->dropColumn('section_video_name');
            $table->dropColumn('section_video_link_youtube');
            $table->dropColumn('section_video_publish');
            $table->dropColumn('section_video_image');
            $table->dropColumn('section_tabs_name');
            $table->dropColumn('section_tabs_description');
            $table->dropColumn('section_tabs_publish');
            $table->dropColumn('section_requirements_name');
            $table->dropColumn('section_requirements_content');
            $table->dropColumn('section_requirements_publish');
            $table->dropColumn('section_faq_name');
            $table->dropColumn('section_faq_publish');
            $table->dropColumn('section_prices_name');
            $table->dropColumn('section_prices_content');
            $table->dropColumn('section_prices_publish');
            $table->dropColumn('section_advantages_content');
            $table->dropColumn('section_advantages_publish');
            $table->dropColumn('section_feedback_name');
            $table->dropColumn('section_feedback_publish');
            $table->dropColumn('section_competencies_name');
            $table->dropColumn('section_competencies_publish');
            $table->dropColumn('section_offers_name');
            $table->dropColumn('section_offers_publish');
            $table->dropColumn('section_reviews_publish');
            $table->dropColumn('section_projects_publish');
        });
    }
}
