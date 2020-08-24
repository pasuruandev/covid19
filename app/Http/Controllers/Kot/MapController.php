<?php

namespace App\Http\Controllers\Kot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Map;
use App\Kecamatan;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class MapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        view()->share('AJAX',
        [
            'datatable' => route('kota.map.data'),
            'get' => route('kota.map.get'),
            'insert' => route('kota.map.insert'),
            'update' => route('kota.map.update'),
            'delete' => route('kota.map.delete')
        ]);
    }

    public function get_kecamatans()
    {
        return Kecamatan::getkota()->get();
    }

    public function index(Request $req)
    {
        return view('dashboard.pages.map.index', [
            'kecamatans' => $this->get_kecamatans()
        ]);
    }

    public function data(Request $req)
    {
        return Datatables::of(Map::getkota()->with('kecamatan'))
                ->editColumn('key', '{{ encrypt($id) }}')
                ->make(true);
    }

    public function get(Request $req, $key)
    {
        $key = decrypt($key);
        $res = Map::getkota()->with('kecamatan')->find($key);
        return response($res);
    }

    public function insert(Request $req)
    {
        try {
            $insert = [
                'prefix' => Map::PREFIX_KOTA,
                'kecamatan_id' => $req->input('kecamatan_id'),
                'suspek' => $req->input('suspek'),
                'konfirmasi' => $req->input('konfirmasi'),
            ];
            $save = Map::create($insert);

            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function update(Request $req)
    {
        try {
            $key = decrypt($req->input('key'));
            $model = Map::getkota()->findOrFail($key);
            $model->suspek = $req->input('suspek');
            $model->konfirmasi = $req->input('konfirmasi');
            $save = $model->save();

            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function delete(Request $req)
    {
        try {
            $key = decrypt($req->input('key'));
            $model = Map::getkota()->findOrFail($key);
            $save = $model->delete();
            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
