<?php

namespace App\Http\Controllers\Kab;

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
            'datatable' => route('kabupaten.map.data'),
            'get' => route('kabupaten.map.get'),
            'insert' => route('kabupaten.map.insert'),
            'update' => route('kabupaten.map.update'),
            'delete' => route('kabupaten.map.delete')
        ]);
    }

    public function get_kecamatans()
    {
        return Kecamatan::getkab()->get();
    }

    public function index(Request $req)
    {
        return view('dashboard.pages.map.index', [
            'kecamatans' => $this->get_kecamatans()
        ]);
    }

    public function data(Request $req)
    {
        return Datatables::of(Map::getkab()->with('kecamatan'))
                ->editColumn('key', '{{ encrypt($id) }}')
                ->make(true);
    }

    public function get(Request $req, $key)
    {
        $key = decrypt($key);
        $res = Map::getkab()->with('kecamatan')->find($key);
        return response($res);
    }

    public function insert(Request $req)
    {
        try {
            $insert = [
                'prefix' => Map::PREFIX_KAB,
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
            $model = Map::getkab()->findOrFail($key);
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
            $model = Map::getkab()->findOrFail($key);
            $save = $model->delete();
            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
