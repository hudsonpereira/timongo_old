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
            $table->string('slug')->unique();
            $table->string('nickname')->unique();

            $table->string('referal_code')->nullable();
            $table->string('refered_by')->nullable();

            $table->unsignedInteger('gender')->default(1);
            $table->unsignedInteger('level')->default(1);
            $table->unsignedInteger('gold')->default(0);

            $table->unsignedInteger('armor')->nullable(); // equipment id relation
            $table->unsignedInteger('weapon_id')->nullable(); // weapon id relation

            $table->unsignedInteger('attack')->default(1);
            $table->unsignedInteger('defence')->default(1);

            $table->unsignedInteger('mana_stone')->default(0);

            $table->unsignedInteger('current_hitpoints')->default($initialHitpoints);
            $table->unsignedInteger('max_hitpoints')->default($initialHitpoints);

            $table->unsignedInteger('current_energy')->default($initialEnergy);
            $table->unsignedInteger('max_energy')->default($initialEnergy);

            $table->unsignedInteger('experience')->default(0);

            $table->string('password');

            $table->datetime('dead_until')->nullable();

            $table->unsignedInteger('first_strike')->nullable();
            $table->unsignedInteger('cooldown_skill')->nullable();
            $table->unsignedInteger('basic_skill')->nullable();

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
