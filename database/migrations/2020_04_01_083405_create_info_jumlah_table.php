<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoJumlahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_jumlah', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl');
            $table->string('prefix');
            $table->integer('odp');
            $table->integer('pdp');
            $table->integer('pdp_negatif');
            $table->integer('positif');
            $table->integer('positif_sembuh');
            $table->integer('positif_meninggal');
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
        Schema::dropIfExists('info_jumlah');
    }
}
