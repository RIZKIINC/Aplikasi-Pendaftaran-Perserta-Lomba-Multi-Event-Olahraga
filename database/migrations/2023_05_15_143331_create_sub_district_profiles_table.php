<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDistrictProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_district_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->bigInteger('id_kecamatan');
            $table->string('kode_kecamatan')->length(25);
            $table->string('nama_camat')->nullable();
            $table->string('telp_camat')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('kodepos')->length(5)->nullable();
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
        Schema::dropIfExists('sub_district_profiles');
    }
}
