<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('olahraga_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->string('nama');
            $table->string('nik');
            $table->date('ttl');
            $table->string('nomor_kk');
            $table->string('akta');
            $table->string('foto');
            $table->string('alamat');
            $table->string('no_olahraga');
            $table->string('domisili');
            $table->string('no_ijazah');
            $table->string('jk');
            $table->timestamps();

            $table->foreign('olahraga_id')->references('id')->on('cabang_olahraga');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
