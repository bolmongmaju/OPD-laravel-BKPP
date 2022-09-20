<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('nama_opd');
            $table->string('short_name');
            $table->text('dasar_hukum')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            // $table->text('pegawai')->nullable();
            $table->text('program')->nullable();
            $table->text('tupoksi')->nullable();
            $table->text('kata_sambutan')->nullable();
            $table->string('foto_pimpinan')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->string('logo');
            $table->string('favicon')->nullable();
            $table->string('maklumat')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
