<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'pasdev',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
            'name' => 'Pasdev'
        ]);

        DB::table('odp')->insert([
            'prefix' => 'kota',
            'tanggal' => date('Y-m-d H:i:s'),
            'jumlah' => 0
        ]);

        DB::table('odp')->insert([
            'prefix' => 'kab',
            'tanggal' => date('Y-m-d H:i:s'),
            'jumlah' => 0
        ]);

        DB::table('pdp')->insert([
            'prefix' => 'kota',
            'tanggal' => date('Y-m-d H:i:s'),
            'jumlah' => 0,
            'negatif' => 0
        ]);

        DB::table('pdp')->insert([
            'prefix' => 'kab',
            'tanggal' => date('Y-m-d H:i:s'),
            'jumlah' => 0,
            'negatif' => 0
        ]);

        DB::table('positif')->insert([
            'prefix' => 'kota',
            'tanggal' => date('Y-m-d H:i:s'),
            'jumlah' => 0,
            'sembuh' => 0,
            'meninggal' => 0
        ]);

        DB::table('positif')->insert([
            'prefix' => 'kab',
            'tanggal' => date('Y-m-d H:i:s'),
            'jumlah' => 0,
            'sembuh' => 0,
            'meninggal' => 0
        ]);

        DB::table('lockdown')->insert([
            'tipe_lokasi' => 'U',
            'lokasi' => 'Perempatan',
            'alamat' => 'Jln. A Yani'
        ]);

        DB::table('article')->insert([
            'title' => 'Judul',
            'content' => 'Lorep ipsum dolor sit amet',
            'header' => 'header.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('suspek')->insert([
            'prefix' => 'kota',
            'tanggal' => date('Y-m-d'),
            'dirawat' => 5,
            'sembuh' => 5,
            'meninggal' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('suspek')->insert([
            'prefix' => 'kab',
            'tanggal' => date('Y-m-d'),
            'dirawat' => 2,
            'sembuh' => 2,
            'meninggal' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
