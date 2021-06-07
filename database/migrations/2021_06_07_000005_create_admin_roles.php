<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'admin_roles',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->default('');
                $table->unsignedInteger('parent_id')->nullable();
                $table->foreign('parent_id', 'admin_role_parent')->references('id')->on('admin_users');
                $table->boolean('seo')->default(false);
                $table->json('abilities')->nullable();
                $table->timestamps();
            }
        );

        Schema::table(
            'admin_users',
            function (Blueprint $table) {
                $table->unsignedInteger('admin_role_id')->nullable();
                $table->foreign('admin_role_id', 'admin_user_role')->references('id')->on('admin_roles');
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
        Schema::table(
            'admin_users',
            function (Blueprint $table) {
                $table->dropForeign('admin_user_role');
                $table->dropColumn('admin_role_id');
            }
        );

        Schema::drop('admin_roles');
    }
}
