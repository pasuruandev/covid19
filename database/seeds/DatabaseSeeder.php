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

        DB::table('article')->insert([
            'title' => 'Judul',
            'content' => 'Lorep ipsum dolor sit amet',
            'header' => 'header.jpg',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('kecamatan')->insert([
            [
                'id' => '3514010',
                'kabupaten_id' => '3514',
                'nama' => 'PURWODADI',
                'latitude' => '-7.803544',
                'longitude' => '112.7271303',
                'created_at' => date('Y-m-d H:i:s')
            ],
            ['id' => '3514020', 'kabupaten_id' => '3514', 'nama' => 'TUTUR', 'latitude' => '-7.8996875', 'longitude' => '112.8224678', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514030', 'kabupaten_id' => '3514', 'nama' => 'PUSPO', 'latitude' => '-7.8360402', 'longitude' => '112.870133', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514040', 'kabupaten_id' => '3514', 'nama' => 'TOSARI', 'latitude' => '-7.8955854', 'longitude' => '112.8939647', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514050', 'kabupaten_id' => '3514', 'nama' => 'LUMBANG', 'latitude' => '-7.7995045', 'longitude' => '112.9773703', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514060', 'kabupaten_id' => '3514', 'nama' => 'PASREPAN', 'latitude' => '-7.7941107', 'longitude' => '112.8939647', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514070', 'kabupaten_id' => '3514', 'nama' => 'KEJAYAN', 'latitude' => '-7.7359823', 'longitude' => '112.8463007', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514080', 'kabupaten_id' => '3514', 'nama' => 'WONOREJO', 'latitude' => '-7.71972', 'longitude' => '112.7748002', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514090', 'kabupaten_id' => '3514', 'nama' => 'PURWOSARI', 'latitude' => '-7.7629501', 'longitude' => '112.7271303', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514100', 'kabupaten_id' => '3514', 'nama' => 'PRIGEN', 'latitude' => '-7.697172', 'longitude' => '112.627899', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514110', 'kabupaten_id' => '3514', 'nama' => 'SUKOREJO', 'latitude' => '-7.7169176', 'longitude' => '112.7187595', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514120', 'kabupaten_id' => '3514', 'nama' => 'PANDAAN', 'latitude' => '-7.6426348', 'longitude' => '112.7032945', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514130', 'kabupaten_id' => '3514', 'nama' => 'GEMPOL', 'latitude' => '-7.6034421', 'longitude' => '112.6794582', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514140', 'kabupaten_id' => '3514', 'nama' => 'BEJI', 'latitude' => '-7.5947854', 'longitude' => '112.7450068', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514150', 'kabupaten_id' => '3514', 'nama' => 'BANGIL', 'latitude' => '-7.604976', 'longitude' => '112.775101', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514160', 'kabupaten_id' => '3514', 'nama' => 'REMBANG', 'latitude' => '-7.6373665', 'longitude' => '112.7986343', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514170', 'kabupaten_id' => '3514', 'nama' => 'KRATON', 'latitude' => '-7.6752088', 'longitude' => '112.8463007', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514180', 'kabupaten_id' => '3514', 'nama' => 'POHJENTREK', 'latitude' => '-7.6786077', 'longitude' => '112.876091', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514190', 'kabupaten_id' => '3514', 'nama' => 'GONDANG WETAN', 'latitude' => '-7.7117048', 'longitude' => '112.9177957', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514200', 'kabupaten_id' => '3514', 'nama' => 'REJOSO', 'latitude' => '-7.6746075', 'longitude' => '112.9475835', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514210', 'kabupaten_id' => '3514', 'nama' => 'WINONGAN', 'latitude' => '-7.7508715', 'longitude' => '112.941626', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514220', 'kabupaten_id' => '3514', 'nama' => 'GRATI', 'latitude' => '-7.7468219', 'longitude' => '113.013113', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514230', 'kabupaten_id' => '3514', 'nama' => 'LEKOK', 'latitude' => '-7.6658741', 'longitude' => '113.013113', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3514240', 'kabupaten_id' => '3514', 'nama' => 'NGULING', 'latitude' => '-7.7036431', 'longitude' => '113.0607675', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3575010', 'kabupaten_id' => '3575', 'nama' => 'GADINGREJO', 'latitude' => '-7.6374665', 'longitude' => '112.8880068', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3575020', 'kabupaten_id' => '3575', 'nama' => 'PURWOREJO', 'latitude' => '-7.6647917', 'longitude' => '112.8969436', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3575030', 'kabupaten_id' => '3575', 'nama' => 'BUGULKIDUL', 'latitude' => '-7.6469193', 'longitude' => '112.8999225', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => '3575031', 'kabupaten_id' => '3575', 'nama' => 'PANGGUNGREJO', 'latitude' => '-7.630350', 'longitude' => '112.920998', 'created_at' => date('Y-m-d H:i:s')]
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

        DB::table('konfirmasi')->insert([
            'prefix' => 'kota',
            'tanggal' => date('Y-m-d'),
            'isolasi' => 5,
            'sembuh' => 5,
            'meninggal' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('konfirmasi')->insert([
            'prefix' => 'kab',
            'tanggal' => date('Y-m-d'),
            'isolasi' => 2,
            'sembuh' => 2,
            'meninggal' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
