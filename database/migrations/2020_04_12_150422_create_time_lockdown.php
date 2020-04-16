<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeLockdown extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_lockdown', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lockdown_id');
            $table->string('tipe', 1)->comment('I => interval, S => Spesifik');
            $table->string('hari', 7)->nullable()->comment("SSRKJSM, untuk kosong ganti dengan - ; * berarti setiap hari");
            $table->date('tgl_awal')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->time('jam_awal')->nullable()->comment("null berarti sehari penuh");
            $table->time('jam_akhir')->nullable();
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
        Schema::dropIfExists('table_time_lockdown');
    }
}
