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
            $initialEnergy = config('rpg.initial_energy');

            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('gender')->unsigned()->default(1);
            $table->integer('level')->unsigned()->default(1);
            $table->integer('gold')->unsigned()->default(0);

            $table->unsignedInteger('armor')->nullable(); // equipment id relation
            $table->unsignedInteger('weapon_id')->nullable(); // weapon id relation

            $table->integer('attack')->unsigned()->default(1);
            $table->integer('defence')->unsigned()->default(1);

            $table->integer('current_hitpoints')->unsigned()->default($initialHitpoints);
            $table->integer('max_hitpoints')->unsigned()->default($initialHitpoints);

            $table->integer('current_energy')->unsigned()->default($initialEnergy);
            $table->integer('max_energy')->unsigned()->default($initialEnergy);

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
