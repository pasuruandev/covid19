<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Odp;
use App\Pdp;
use App\Positif;
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

    public function get_map(){
        $data = DB::table('maps AS m')
        ->join('kecamatan AS k','m.id_kecamatan','=','k.id')
        ->select('k.nama','k.latitude','k.longitude','m.odp','m.pdp','m.positif')
        ->get();        
        return response($data);
    }
    
    public function get_spesific_map($id_kab){
        $mapdata = DB::table('maps AS m')
        ->join('kecamatan AS k','m.id_kecamatan','=','k.id')
        ->select('k.nama','k.latitude','k.longitude','m.odp','m.pdp','m.positif','m.id AS idmap','m.update_at AS last_up')
        ->where('k.kabupaten_id',$id_kab)
        ->get();
        return response($mapdata);
    }
}
