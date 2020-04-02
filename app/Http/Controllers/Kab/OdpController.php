<?php

namespace App\Http\Controllers\Kab;

use Illuminate\Http\Request;

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

    public function index(Request $req)
    {
        return view('dashboard.pages.dashboard');
    }
}
