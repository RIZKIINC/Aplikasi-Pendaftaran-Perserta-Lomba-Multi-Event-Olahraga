<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_map_district_sport');
            $table->string('participant_name');
            $table->date('participant_dob');
            $table->string('participant_gender');
            $table->string('participant_address');
            $table->string('participant_domicile');
            $table->string('participant_status');
            $table->string('no_ktp');
            $table->string('no_kk');
            $table->string('no_akte');
            $table->string('no_ijazah');
            $table->string('no_class');
            $table->text('pas_foto');
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
        Schema::dropIfExists('participants');
    }
}
