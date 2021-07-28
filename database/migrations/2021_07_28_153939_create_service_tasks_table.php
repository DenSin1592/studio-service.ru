<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('service_id')->nullable();
            $table->integer('position')->default(0);
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();

            $table->foreign('service_id', 'tasks_service_fk')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_tasks');
    }
}
