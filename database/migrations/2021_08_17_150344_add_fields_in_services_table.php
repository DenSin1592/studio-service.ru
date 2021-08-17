<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->text('section_advantages_content')->nullable();
            $table->boolean('section_advantages_publish')->default(false);
        });

        Schema::create('before_after_image_service', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();

            $table->unsignedInteger('before_after_image_id');
            $table->unsignedInteger('service_id');
            $table->integer('position')->default(0);
            $table->foreign('before_after_image_id', 'before_after_image_to_service_fk')->references('id')->on('before_after_images');
            $table->foreign('service_id', 'service_to_before_after_image_fk')->references('id')->on('services');
            $table->unique(['before_after_image_id', 'service_id'], 'before_after_image_service_unique');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('before_after_image_service');

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('section_advantages_publish');
            $table->dropColumn('section_advantages_content');
        });
    }
}
