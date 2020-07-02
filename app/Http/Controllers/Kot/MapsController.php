<?php

namespace App\Http\Controllers\Kot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Odp;
use Carbon\Carbon;
use DB;

class MapsController extends Controller
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


    public function refresh(Request $req)
    {
        $data = $this->get();
        return response($data);
    }

    public function getView(Request $req)
    {
        return view('dashboard.pages.maps.update', [
            'data' => $this->get(),
            'link_update' => route('kota.odp.update'),
            'link_refresh' => route('kota.odp.refresh'),
        ]);
    }

    public function get_kecamatan(){
        $data = DB::table('kecamatan as k')->get();
        return $data;
    }

    public function get_map(){
        $mapdata = DB::table('maps AS m')
        ->join('kecamatan AS k','m.id_kecamatan','=','k.id')
        ->select('k.nama','k.latitude','k.longitude','m.odp','m.pdp','m.positif','m.id AS idmap','m.update_at AS last_up')
        ->get();
        $kecamatan = $this->get_kecamatan();
                
        return view('dashboard.pages.maps.update', compact('mapdata','kecamatan'));
    }

    public function tambah_map(Request $request){
        $masukgan = DB::table('maps')->insert([
            'id_kecamatan' => $request->kecamatan,
            'odp'          => $request->odp_lokasi,
            'pdp'          => $request->pdp_lokasi,
            'positif'      => $request->positif_lokasi
            
        ]);
        return redirect('/dashboard/content/maps/update');
    }

    public function hapusMaps($id){
        $hapus = DB::table('maps')->where('id',$id)->delete();
        return redirect('/dashboard/content/maps/update');
    }

    public function updateMaps(Request $request){
        $update = DB::table('maps AS m')
                ->where('id',$request->id)
                ->update([
                    'odp'       => $request->odp_lokasi,
                    'pdp'       => $request->pdp_lokasi,
                    'positif'   => $request->positif_lokasi
                ]);
        return redirect('/dashboard/content/maps/update');
    }
}
