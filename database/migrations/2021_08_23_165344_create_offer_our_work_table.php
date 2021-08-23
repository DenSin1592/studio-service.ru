<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferOurWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_our_work', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('our_work_id');
            $table->integer('position')->default(0);
            $table->foreign('our_work_id', 'our_work_to_offer_fk')->references('id')->on('our_works');
            $table->foreign('offer_id', 'offer_to_our_work_fk')->references('id')->on('offers');
            $table->unique(['our_work_id', 'offer_id'], 'offer_our_work_unique');

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
        Schema::dropIfExists('offer_our_work');
    }
}
