<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('nip_pegawai');
            $table->string('nip_pejabat')->default('000000000000000000');
            $table->string('nama_pegawai')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('nama_kantor')->nullable();
            $table->string('kode_cetak')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
