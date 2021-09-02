<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenceOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competence_offer', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('competence_id');
            $table->unsignedInteger('offer_id');
            $table->integer('position')->default(0);
            $table->foreign('competence_id', 'competence_to_offer_fk')->references('id')->on('competencies');
            $table->foreign('offer_id', 'offer_to_competence_fk')->references('id')->on('offers');
            $table->unique(['competence_id', 'offer_id'], 'competence_offer_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competence_offer');
    }
}
