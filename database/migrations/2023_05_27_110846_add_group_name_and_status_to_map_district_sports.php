<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupNameAndStatusToMapDistrictSports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('map_district_sports', function (Blueprint $table) {
            $table->string('group_name');
            $table->enum('status', ['On Process', 'Verified', 'Unverified']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('map_district_sports', function (Blueprint $table) {
            $table->dropColumn('group_name');
            $table->dropColumn('status');
        });
    }
}
