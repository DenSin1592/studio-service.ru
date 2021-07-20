<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->boolean('publish')->default(false);
            $table->boolean('on_home_page')->default(false);
            $table->string('email')->nullable();
            $table->text('text')->nullable();
            $table->timestamp('review_date')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamps();
        });

        Schema::create('review_images', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('review_id');
            $table->foreign('review_id', 'fk_review_image')->references('id')->on('reviews');

            $table->string('image')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });

        Schema::create('reviews_services', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('review_id');
            $table->foreign('review_id', 'fk_review_service')->references('id')->on('reviews');

            $table->unsignedInteger('service_id');
            $table->foreign('service_id', 'fk_service_review')->references('id')->on('services');

            $table->integer('position')->default(0);
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
        Schema::dropIfExists('reviews_services');
        Schema::dropIfExists('review_images');
        Schema::dropIfExists('reviews');
    }
}
