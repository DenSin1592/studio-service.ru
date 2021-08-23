<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_review', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('review_id');
            $table->integer('position')->default(0);
            $table->foreign('review_id', 'review_to_offer_fk')->references('id')->on('reviews');
            $table->foreign('offer_id', 'offer_to_review_fk')->references('id')->on('offers');
            $table->unique(['review_id', 'offer_id'], 'offer_review_unique');

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
        Schema::dropIfExists('offer_review');
    }
}
