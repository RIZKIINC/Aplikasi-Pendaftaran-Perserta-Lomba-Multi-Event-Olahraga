<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeTelpCamat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_district_profiles', function (Blueprint $table) {
            $table->Integer('telp_camat')->length(14)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_district_profiles', function (Blueprint $table) {
            $table->dropColumn('telp_camat');
        });
    }
}
