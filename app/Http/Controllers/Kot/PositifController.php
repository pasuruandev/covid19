<?php

namespace App\Http\Controllers\Kot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Positif;
use Carbon\Carbon;

class PositifController extends Controller
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
        return Positif::getkab()->orderBy('tanggal', 'desc')->first();
    }

    public function refresh(Request $req)
    {
        $data = $this->get();
        return response($data);
    }

    public function edit(Request $req)
    {
        return view('dashboard.pages.positif.update', [
            'data' => $this->get(),
            'link_update' => route('kabupaten.positif.update'),
            'link_refresh' => route('kabupaten.positif.refresh'),
        ]);
    }

    public function update(Request $req)
    {
        try {
            $data = Positif::getkab()->where('tanggal', 'like', Carbon::now()->format('Y-m-d').'%')->first();
            if ($data) {
                $data->tanggal = Carbon::now();
                $data->jumlah = $req->input('jumlah');
                $data->sembuh = $req->input('sembuh');
                $data->meninggal = $req->input('meninggal');
                $save = $data->save();
            } else {
                $save = Positif::create([
                    'prefix' => 'kota',
                    'tanggal' => Carbon::now(),
                    'jumlah' => $req->input('jumlah'),
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
