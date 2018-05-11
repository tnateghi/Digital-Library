<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level')->default('new');
            $table->string('username')->unique();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique()->nullable();
            $table->string('tel');
            $table->text('address');
            $table->text('status')->nullable();
            $table->string('password');
            $table->string('image')->default('default.jpg');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
