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
            $initialHitpoints = config('rpg.initial_hitpoints');

            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('level')->unsigned()->default(1);
            $table->integer('gold')->unsigned()->default(0);
            $table->integer('hitpoints')->unsigned()->default($initialHitpoints);
            $table->integer('max_hitpoints')->unsigned()->default($initialHitpoints);

            $table->integer('experience')->unsigned()->default(0);

            $table->string('nickname')->unique();
            $table->string('password');
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
