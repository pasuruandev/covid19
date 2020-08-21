<?php

namespace App\Http\Controllers\Kab;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Konfirmasi;
use Carbon\Carbon;

class KonfirmasiController extends Controller
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

    public function get()
    {
        return Konfirmasi::getkab()->orderBy('tanggal', 'desc')->first();
    }

    public function refresh(Request $req)
    {
        $data = $this->get();
        $data->jumlah();
        return response($data);
    }

    public function edit(Request $req)
    {
        $data = $this->get();
        if (!@$data) {
            $data = new Konfirmasi();
            $data->prefix = 'kab';
            $data->tanggal = date('Y-m-d');
            $data->isolasi = 0;
            $data->sembuh = 0;
            $data->meninggal = 0;
        }
        return view('dashboard.pages.konfirmasi.update', [
            'data' => $data,
            'link_update' => route('kabupaten.konfirmasi.update'),
            'link_refresh' => route('kabupaten.konfirmasi.refresh'),
        ]);
    }

    public function update(Request $req)
    {
        try {
            $data = Konfirmasi::getkab()->where('tanggal', 'like', Carbon::now()->format('Y-m-d').'%')->first();
            if ($data) {
                $data->tanggal = Carbon::now();
                $data->isolasi = $req->input('isolasi');
                $data->sembuh = $req->input('sembuh');
                $data->meninggal = $req->input('meninggal');
                $save = $data->save();
            } else {
                $save = Konfirmasi::create([
                    'prefix' => 'kab',
                    'tanggal' => Carbon::now(),
                    'isolasi' => $req->input('isolasi'),
                    'sembuh' => $req->input('sembuh'),
                    'meninggal' => $req->input('meninggal')
                ]);
            }
            if ($save) return response("Success", 200);
            return response("Gaga Simpan!", 500);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
