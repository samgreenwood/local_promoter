<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table) {
            $table->engine="InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('lat');
            $table->string('longitude');
            $table->string('town')->nullable();
            $table->string('state')->nullable();
            $table->integer('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('verification_code')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('website');
            $table->string('email');
            $table->tinyInteger('featured')->default(0);
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
        Schema::drop('companies');
    }
}
