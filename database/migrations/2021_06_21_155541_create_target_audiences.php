<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetAudiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'target_audiences',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('parent_id')->nullable();
                $table->foreign('parent_id')->references('id')->on('target_audiences');
                $table->string('alias')->nullable()->unique();
                $table->string('name')->nullable();
                $table->string('icon')->nullable();
                $table->boolean('publish')->default(false);
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
        Schema::dropIfExists('target_audiences');
    }
}
