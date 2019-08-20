<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataDevice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_device', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_device");
            $table->unsignedBigInteger("Va");
            $table->unsignedBigInteger("Vb");
            $table->unsignedBigInteger("Vc");
            $table->unsignedBigInteger("Vab");
            $table->unsignedBigInteger("Vbc");
            $table->unsignedBigInteger("Vca");
            $table->unsignedBigInteger("Ia");
            $table->unsignedBigInteger("Ib");
            $table->unsignedBigInteger("Ic");
            $table->unsignedBigInteger("Pa");
            $table->unsignedBigInteger("Pb");
            $table->unsignedBigInteger("Pc");
            $table->unsignedBigInteger("Qa");
            $table->unsignedBigInteger("Qb");
            $table->unsignedBigInteger("Qc");
            $table->unsignedBigInteger("Sa");
            $table->unsignedBigInteger("Sb");
            $table->unsignedBigInteger("Sc");
            $table->unsignedBigInteger("PFa");
            $table->unsignedBigInteger("PFb");
            $table->unsignedBigInteger("PFc");
            $table->unsignedBigInteger("Freq");
            $table->unsignedBigInteger("TAE");
            $table->timestamps();

            // Foreign Key
            $table->foreign("id_device")->references("id")->on("m_device");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_device');
    }
}
