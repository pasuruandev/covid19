<?php

namespace App\Http\Controllers\Kab;

use Illuminate\Http\Request;

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

    public function index(Request $req)
    {
        return view('dashboard.pages.dashboard');
    }
}
