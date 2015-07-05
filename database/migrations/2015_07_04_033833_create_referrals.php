<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferrals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function($table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('facebook');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('referrals');
    }
}
