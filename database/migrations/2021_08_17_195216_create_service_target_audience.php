<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTargetAudience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_target_audience', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('service_id');
            $table->unsignedInteger('target_audience_id');
            $table->integer('position')->default(0);
            $table->foreign('target_audience_id', 'target_audience_to_service_fk')->references('id')->on('target_audiences');
            $table->foreign('service_id', 'service_to_target_audience_fk')->references('id')->on('services');
            $table->unique(['target_audience_id', 'service_id'], 'before_after_image_service_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_target_audience');
    }
}
