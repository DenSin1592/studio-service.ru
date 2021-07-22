<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_works', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->boolean('publish')->nullable();
            $table->integer('position')->nullable();
            $table->text('preview')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::create('our_work_images', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('our_work_id');
            $table->foreign('our_work_id', 'fk_our_work_image')->references('id')->on('our_works');

            $table->string('image')->nullable();
            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });

        Schema::create('our_work_service', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('our_work_id');
            $table->foreign('our_work_id', 'fk_our_work_service')->references('id')->on('our_works');

            $table->unsignedInteger('service_id');
            $table->foreign('service_id', 'fk_service_our_work')->references('id')->on('services');

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
        Schema::dropIfExists('our_work_service');
        Schema::dropIfExists('our_work_images');
        Schema::dropIfExists('our_works');
    }
}
