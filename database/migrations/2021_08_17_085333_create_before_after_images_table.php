<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeforeAfterImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('before_after_images', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('image_before')->nullable();
            $table->string('image_after')->nullable();
            $table->boolean('publish')->default(false);
            $table->boolean('on_home_page')->default(false);
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
        Schema::dropIfExists('before_after_images');
    }
}
