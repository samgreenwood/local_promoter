<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string('email')->unique();
            $table->integer('company_id')->nullable()->unsigned();
            $table->integer('suburb_id')->nullable()->unsigned();
            $table->integer('gender')->nullable();
            $table->string('name');
            $table->string('street', 255)->nullable();
            $table->date('dob')->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('mobile', 45)->nullable();
            $table->string('image')->nullable();
            $table->string('about_me')->nullable();
            $table->string('password', 60)->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
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
        Schema::drop('users');
    }
}
