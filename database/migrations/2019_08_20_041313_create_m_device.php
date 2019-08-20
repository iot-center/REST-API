<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_device', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_gedung');
            $table->unsignedBigInteger('id_lantai');
            $table->unsignedBigInteger('id_ruangan');
            $table->longText("uri");
            $table->timestamps();

            // Foreign Key
            $table->foreign("id_gedung")->references("id")->on("m_gedung");
            $table->foreign("id_lantai")->references("id")->on("m_lantai");
            $table->foreign("id_ruangan")->references("id")->on("m_ruangan");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_device');
    }
}
