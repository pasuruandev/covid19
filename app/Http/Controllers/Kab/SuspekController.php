<?php

namespace App\Http\Controllers\Kab;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suspek;
use Carbon\Carbon;

class SuspekController extends Controller
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
        return Suspek::getkab()->orderBy('tanggal', 'desc')->first();
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
            $data = new Suspek();
            $data->prefix = 'kab';
            $data->tanggal = date('Y-m-d');
            $data->dirawat = 0;
            $data->sembuh = 0;
            $data->meninggal = 0;
        }
        return view('dashboard.pages.suspek.update', [
            'data' => $data,
            'link_update' => route('kabupaten.suspek.update'),
            'link_refresh' => route('kabupaten.suspek.refresh'),
        ]);
    }

    public function update(Request $req)
    {
        try {
            $data = Suspek::getkab()->where('tanggal', 'like', Carbon::now()->format('Y-m-d').'%')->first();
            if ($data) {
                $data->tanggal = Carbon::now();
                $data->dirawat = $req->input('dirawat');
                $data->sembuh = $req->input('sembuh');
                $data->meninggal = $req->input('meninggal');
                $save = $data->save();
            } else {
                $save = Suspek::create([
                    'prefix' => 'kab',
                    'tanggal' => Carbon::now(),
                    'dirawat' => $req->input('dirawat'),
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
