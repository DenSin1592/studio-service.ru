<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('alias')->nullable()->unique();
            $table->integer('position')->default(0);
            $table->unsignedInteger('service_id')->nullable();
            $table->unsignedInteger('target_audience_id')->nullable();
            $table->boolean('publish')->default(false);
            $table->string('youtube_link')->nullable();
            $table->text('block_advantages')->nullable();

            $table->string('header')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->foreign('service_id', 'offer_service_fk')->references('id')->on('services');
            $table->foreign('target_audience_id', 'target_audience_service_fk')->references('id')->on('target_audiences');
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
        Schema::dropIfExists('offers');
    }
}
