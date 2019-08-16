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
            $table->bigIncrements('id');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir')->date();
            $table->tinyInteger('jenis_kelamin');
            $table->string('gol_darah');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->unsignedBigInteger('id_provinsi');
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_kelurahan');
            $table->unsignedBigInteger('id_kecamatan');
            $table->unsignedInteger('id_agama');
            $table->unsignedInteger('id_status_perkawinan');
            $table->unsignedTinyInteger('id_kewarga_negaraan');
            $table->string('username');
            $table->string('email');
            $table->string('no_hp');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_provinsi')->references('id')->on('m_provinsi');
            $table->foreign('id_kota')->references('id')->on('m_kota');
            $table->foreign('id_kelurahan')->references('id')->on('m_kelurahan');
            $table->foreign('id_kecamatan')->references('id')->on('m_kecamatan');
            $table->foreign('id_agama')->references('id')->on('m_agama');
            $table->foreign('id_status_perkawinan')->references('id')->on('m_perkawinan');
            $table->foreign('id_kewarga_negaraan')->references('id')->on('m_kewarga_negaraan');
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
