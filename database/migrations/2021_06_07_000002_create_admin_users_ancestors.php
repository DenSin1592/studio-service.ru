<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersAncestors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users_ancestors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('descendant_id');
            $table->unsignedInteger('ancestor_id');
            $table->unsignedInteger('depth')->default(0);
            $table->foreign('descendant_id', 'admin_user_ancestor_descendant_fk')->references('id')->on('admin_users');
            $table->foreign('ancestor_id', 'admin_user_ancestor_ancestor_fk')->references('id')->on('admin_users');
            $table->unique(['descendant_id', 'ancestor_id'], 'admin_user_ancestor_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_users_ancestors');
    }
}
