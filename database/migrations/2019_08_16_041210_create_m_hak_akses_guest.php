<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMHakAksesGuest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_hak_akses_guest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_gedung');
            $table->unsignedBigInteger('id_lantai');
            $table->unsignedBigInteger('id_ruangan');
            $table->timestamps();

            // Foreign
            $table->foreign('id_gedung')->references('id')->on('m_gedung');
            $table->foreign('id_lantai')->references('id')->on('m_lantai');
            $table->foreign('id_ruangan')->references('id')->on('m_ruangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_hak_akses_guest');
    }
}
