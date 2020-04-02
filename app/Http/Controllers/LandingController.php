<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Odp;
use App\Pdp;
use App\Positif;

class LandingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index(Request $req)
    {
        $odp_kab = Odp::getDataKab();
        $odp_kota = Odp::getDataKota();
        $pdp_kab = Pdp::getDataKab();
        $pdp_kota = Pdp::getDataKota();
        $positif_kab = Positif::getDataKab();
        $positif_kota = Positif::getDataKota();

        $date_odp_kab = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $odp_kab->tanggal);
        $date_odp_kota = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $odp_kota->tanggal);
        $date_pdp_kab = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pdp_kab->tanggal);
        $date_pdp_kota = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pdp_kota->tanggal);
        $date_positif_kab = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $positif_kab->tanggal);
        $date_positif_kota = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $positif_kota->tanggal);

        $tanggal_terakhir = $date_odp_kab->max($date_odp_kota);
        $tanggal_terakhir = $tanggal_terakhir->max($date_pdp_kab);
        $tanggal_terakhir = $tanggal_terakhir->max($date_pdp_kota);
        $tanggal_terakhir = $tanggal_terakhir->max($date_positif_kab);
        $tanggal_terakhir = $tanggal_terakhir->max($date_positif_kota);
        $tanggal_terakhir = $tanggal_terakhir->format('Y-m-d H:i:s');

        return view('landing', [
            'odp' => [
                'kab' => $odp_kab,
                'kota' => $odp_kota
            ],
            'pdp' => [
                'kab' => $pdp_kab,
                'kota' => $pdp_kota
            ],
            'positif' => [
                'kab' => $positif_kab,
                'kota' => $positif_kota
            ],
            'tanggal_terakhir' => $tanggal_terakhir
        ]);
    }
}
