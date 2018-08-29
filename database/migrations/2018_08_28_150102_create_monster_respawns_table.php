<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonsterRespawnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monster_respawns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token');
            $table->integer('monster_id')->unsigned();
            $table->integer('current_hitpoints')->unsigned();
            $table->integer('max_hitpoints')->unsigned();
            $table->integer('level')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->integer('attack')->unsigned();
            $table->integer('defence')->unsigned();
            $table->integer('experience')->unsigned();
            $table->boolean('is_active')->default(true);
            $table->dateTime('cleared_at')->nullable();
            $table->unsignedInteger('respawn_time')->default(1); // in minutes
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
        Schema::dropIfExists('monster_respawns');
    }
}
