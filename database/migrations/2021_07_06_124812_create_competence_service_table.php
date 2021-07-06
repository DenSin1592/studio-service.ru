<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_service', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('competence_id');
            $table->unsignedInteger('service_id');
            $table->integer('position')->default(0);
            $table->foreign('competence_id', 'competence_to_service_fk')->references('id')->on('competencies');
            $table->foreign('service_id', 'service_to_competence_fk')->references('id')->on('services');
            $table->unique(['competence_id', 'service_id'], 'competence_service_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competence_service');
    }
}
