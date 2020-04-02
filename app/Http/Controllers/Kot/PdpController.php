<?php

namespace App\Http\Controllers\Kot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pdp;
use Carbon\Carbon;

class PdpController extends Controller
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
        return Pdp::getkota()->orderBy('tanggal', 'desc')->first();
    }

    public function refresh(Request $req)
    {
        $data = $this->get();
        return response($data);
    }

    public function edit(Request $req)
    {
        return view('dashboard.pages.pdp.update', [
            'data' => $this->get(),
            'link_update' => route('kota.pdp.update'),
            'link_refresh' => route('kota.pdp.refresh'),
        ]);
    }

    public function update(Request $req)
    {
        try {
            $data = Pdp::getkota()->where('tanggal', 'like', Carbon::now()->format('Y-m-d').'%')->first();
            if ($data) {
                $data->tanggal = Carbon::now();
                $data->jumlah = $req->input('jumlah');
                $data->negatif = $req->input('negatif');
                $save = $data->save();
            } else {
                $save = Pdp::create([
                    'prefix' => 'kota',
                    'tanggal' => Carbon::now(),
                    'jumlah' => $req->input('jumlah'),
                    'negatif' => $req->input('negatif')
                ]);
            }
            if ($save) return response("Success", 200);
            return response("Gaga Simpan!", 500);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
