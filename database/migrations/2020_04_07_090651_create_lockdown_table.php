<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLockdownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockdown', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipe_lokasi', 1)->comment('U => umum, J => jalan, M => masjid, G => gereja');
            $table->string('lokasi');
            $table->text('alamat');
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('lockdown');
    }
}
