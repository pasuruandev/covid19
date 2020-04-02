<?php

namespace App\Http\Controllers\Kab;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Odp;
use Carbon\Carbon;

class OdpController extends Controller
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
        return Odp::getkab()->orderBy('tanggal', 'desc')->first();
    }

    public function refresh(Request $req)
    {
        $data = $this->get();
        return response($data);
    }

    public function edit(Request $req)
    {
        return view('dashboard.pages.odp.update', [
            'data' => $this->get(),
            'link_update' => route('kabupaten.odp.update'),
            'link_refresh' => route('kabupaten.odp.refresh'),
        ]);
    }

    public function update(Request $req)
    {
        try {
            $data = Odp::getkab()->where('tanggal', 'like', Carbon::now()->format('Y-m-d').'%')->first();
            if ($data) {
                $data->tanggal = Carbon::now();
                $data->jumlah = $req->input('jumlah');
                $save = $data->save();
            } else {
                $save = Odp::create([
                    'prefix' => 'kab',
                    'tanggal' => Carbon::now(),
                    'jumlah' => $req->input('jumlah')
                ]);
            }
            if ($save) return response("Success", 200);
            return response("Gaga Simpan!", 500);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
