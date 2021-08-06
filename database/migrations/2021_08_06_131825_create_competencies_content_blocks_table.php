<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenciesContentBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_content_blocks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('position')->default(0);
            $table->boolean('publish')->default(false);
            $table->text('content')->nullable();
            $table->unsignedInteger('competence_id')->nullable();

            $table->foreign('competence_id', 'content_competence_fk')->references('id')->on('competencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competence_content_blocks');
    }
}
