<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Odp;
use App\Pdp;
use App\Positif;
use App\Suspek;
use App\Konfirmasi;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $req)
    {
        return view('dashboard.pages.dashboard', [
            'odp' => [
                'kab' => Odp::getDataKab(),
                'kota' => Odp::getDataKota()
            ],
            'pdp' => [
                'kab' => Pdp::getDataKab(),
                'kota' => Pdp::getDataKota()
            ],
            'positif' => [
                'kab' => Positif::getDataKab(),
                'kota' => Positif::getDataKota()
            ]
        ]);
    }

    public function index2(Request $req)
    {
        return view('dashboard.pages.dashboard2', [
            'suspek' => [
                'kab' => Suspek::getDataKab(),
                'kota' => Suspek::getDataKota()
            ],
            'konfirmasi' => [
                'kab' => Konfirmasi::getDataKab(),
                'kota' => Konfirmasi::getDataKota()
            ]
        ]);
    }
}
