<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesAndTextPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'nodes',
            function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('parent_id')->nullable();
                $table->foreign('parent_id')->references('id')->on('nodes');
                $table->string('alias')->nullable()->unique();
                $table->string('name')->nullable();
                $table->boolean('publish')->default(false);
                $table->boolean('in_tree_publish')->default(false);
                $table->integer('position')->default(0);
                $table->boolean('menu_top')->default(false);
                $table->boolean('menu_bottom')->default(false);
                $table->string('type')->nullable();

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nodes');
    }
}
