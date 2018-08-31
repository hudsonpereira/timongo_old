<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAreasRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('map_id')->default(1);
            $table->unsignedInteger('area_id')->default(1);

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('map_id')->references('id')->on('maps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['area_id']);
            $table->dropForeign(['map_id']);
        });
    }
}
