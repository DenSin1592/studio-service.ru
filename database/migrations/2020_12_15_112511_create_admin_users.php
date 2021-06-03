<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'admin_users',
            function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();

                $table->string('username', 128)->unique();
                $table->string('password', 60);
                $table->string('remember_token', 100)->nullable()->unique();
                $table->boolean('active')->default(false);

                $table->json('allowed_ips')->nullable();
                $table->boolean('super')->default(false);

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
        Schema::dropIfExists('admin_users');
    }
}
