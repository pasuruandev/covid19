<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Odp;
use App\Pdp;
use App\Positif;
use App\Suspek;
use App\Konfirmasi;
use App\Lockdown;
use App\Article;
use App\Map;
use DB;

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
        return view('landing');
    }

    public function lockdown_page(Request $req)
    {
        return view('pages.lockdown');
    }

    public function article_page(Request $req, $slug)
    {
        $str = explode('_', $slug);
        $key = base64_decode($str[(sizeof($str) - 1)]);
        $article = Article::findOrFail($key);
        return view('pages.article', ['article' => $article]);
    }

    public function get_data(Request $req)
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

        return response([
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

    public function get_data2(Request $req)
    {
        $suspek_kab = Suspek::getDataKab();
        $suspek_kota = Suspek::getDataKota();
        $konfirmasi_kab = Konfirmasi::getDataKab();
        $konfirmasi_kota = Konfirmasi::getDataKota();

        $date_suspek_kab = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $suspek_kab->tanggal);
        $date_suspek_kota = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $suspek_kota->tanggal);
        $date_konfirmasi_kab = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $konfirmasi_kab->tanggal);
        $date_konfirmasi_kota = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $konfirmasi_kota->tanggal);

        $tanggal_terakhir = $date_suspek_kab->max($date_suspek_kota);
        $tanggal_terakhir = $tanggal_terakhir->max($date_konfirmasi_kab);
        $tanggal_terakhir = $tanggal_terakhir->max($date_konfirmasi_kota);
        $tanggal_terakhir = $tanggal_terakhir->format('Y-m-d H:i:s');

        $suspek_kab->jumlah();
        $suspek_kota->jumlah();
        $konfirmasi_kab->jumlah();
        $konfirmasi_kota->jumlah();
        
        return response([
            'suspek' => [
                'kab' => $suspek_kab,
                'kota' => $suspek_kota
            ],
            'konfirmasi' => [
                'kab' => $konfirmasi_kab,
                'kota' => $konfirmasi_kota
            ],
            'tanggal_terakhir' => $tanggal_terakhir
        ]);
    }

    public function get_lockdowns(Request $req, $limit = 0)
    {
        $query = Lockdown::with('waktu');
        if ($limit > 0) $query = $query->orderBy('created_at', 'desc')->limit($limit);
        return response($query->get());
    }

    public function get_articles(Request $req, $limit = 0)
    {
        $query = new Article;
        if ($limit > 0) $query = $query->orderBy('created_at', 'desc')->limit($limit);
        return response($query->get());
    }
    
    public function get_map($prefix){
        $mapdata = Map::where('prefix', $prefix)->with('kecamatan')->get();
        return response($mapdata);
    }

    public function get_chart_data(Request $req, $day = 7)
    {
        $day_start = \Carbon\Carbon::now()->subDays(1 + $day)->setTime(0, 0, 0);
        $day_end = \Carbon\Carbon::now()->subDays(1)->setTime(23, 59, 59);

        $suspek_kab = Suspek::getLastDatasByDayKab($day_start, $day_end);
        $suspek_kota = Suspek::getLastDatasByDayKota($day_start, $day_end);
        $konfirmasi_kab = Konfirmasi::getLastDatasByDayKab($day_start, $day_end);
        $konfirmasi_kota = Konfirmasi::getLastDatasByDayKota($day_start, $day_end);

        $dates = $suspek_kab->map(function($el) {
            return $el->tanggal;
        });

        $suspek_kab = $suspek_kab->map(function($el) {
            return $el->jumlah();
        });
        $suspek_kota = $suspek_kota->map(function($el) {
            return $el->jumlah();
        });
        $konfirmasi_kab = $konfirmasi_kab->map(function($el) {
            return $el->jumlah();
        });
        $konfirmasi_kota = $konfirmasi_kota->map(function($el) {
            return $el->jumlah();
        });

        return response([
            'dates' => $dates,
            'suspek_kab' => $suspek_kab,
            'suspek_kota' => $suspek_kota,
            'konfirmasi_kab' => $konfirmasi_kab,
            'konfirmasi_kota' => $konfirmasi_kota
        ]);
    }
}
