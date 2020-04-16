<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lockdown;
use Yajra\DataTables\Facades\DataTables;

class LockdownController extends Controller
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
        return view('dashboard.pages.content.lockdown');
    }

    public function data(Request $req)
    {
        return Datatables::of(Lockdown::with('waktu'))
                ->editColumn('key', '{{ encrypt($id) }}')
                ->make(true);
    }

    public function get(Request $req, $key)
    {
        $key = decrypt($key);
        $res = Lockdown::with('waktu')->find($key);
        return response($res);
    }

    public function insert(Request $req)
    {
        try {
            $insert = [
                'tipe_lokasi' => $req->input('tipe_lokasi'),
                'lokasi' => $req->input('lokasi'),
                'alamat' => $req->input('alamat'),
                'deskripsi' => $req->input('deskripsi'),
            ];
            $model = Lockdown::create($insert);

            $waktu = json_decode($req->input('waktu'), true);
            $insert_waktu = [];
            foreach($waktu as $w) {
                $iw = [
                    'tipe' => $w['tipe'],
                    'jam_awal' => ($jam_awal = $w['jam_awal']) == '' ? NULL : $jam_awal,
                    'jam_akhir' => ($jam_akhir = $w['jam_akhir']) == '' ? NULL : $jam_akhir,
                ];
                if ($iw['tipe'] == 'I') {
                    $iw['hari'] = $w['hari'];
                } elseif ($iw['tipe'] == 'S') {
                    $iw['tgl_awal'] = $w['tgl_awal'];
                    $iw['tgl_akhir'] = $w['tgl_akhir'];
                }
                $insert_waktu[] = $iw;
            }
            $save = $model->waktu()->createMany($insert_waktu);
            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            if ($model) $model->delete();
            return response($e->getMessage(), 500);
        }
    }

    public function update(Request $req)
    {
        try {
            $key = decrypt($req->input('key'));
            $model = Lockdown::findOrFail($key);
            $model->tipe_lokasi = $req->input('tipe_lokasi');
            $model->lokasi = $req->input('lokasi');
            $model->alamat = $req->input('alamat');
            $model->deskripsi = $req->input('deskripsi');
            $save = $model->save();

            $waktu = json_decode($req->input('waktu'), true);
            $insert_waktu = [];
            foreach($waktu as $w) {
                $iw = [
                    'tipe' => $w['tipe'],
                    'jam_awal' => ($jam_awal = $w['jam_awal']) == '' ? NULL : $jam_awal,
                    'jam_akhir' => ($jam_akhir = $w['jam_akhir']) == '' ? NULL : $jam_akhir,
                ];
                if ($iw['tipe'] == 'I') {
                    $iw['hari'] = $w['hari'];
                } elseif ($iw['tipe'] == 'S') {
                    $iw['tgl_awal'] = $w['tgl_awal'];
                    $iw['tgl_akhir'] = $w['tgl_akhir'];
                }
                $insert_waktu[] = $iw;
            }
            $old_waktu = $model->waktu()->get();
            $save = $model->waktu()->createMany($insert_waktu);
            if (!$save) throw new Exception("Error", 500);
            $old_waktu->map(function($el) {
                $el->delete();
            });
            return response('Success', 200);
        } catch (\Exception $e) {
            if ($model && @$old_waktu) {
                $model->waktu()->delete();
                $model->waktu()->saveMany($old_waktu);
            }
            return response($e->getMessage(), 500);
        }
    }

    public function delete(Request $req)
    {
        try {
            $key = decrypt($req->input('key'));
            $model = Lockdown::findOrFail($key);
            $save = $model->delete();
            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
