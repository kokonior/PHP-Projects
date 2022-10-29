<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->timestamps();
            $table->date('tanggal_cek_in');
            $table->date('tanggal_cek_out');
            $table->string('jumlah_kamar');
            $table->string('nama_pemesan');
            $table->string('email');
            $table->integer('no_telp');
            $table->string('nama_tamu');
            $table->foreignId('kamar_id')->references('id')->on('kamars');
            $table->string('status')->default('booking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
