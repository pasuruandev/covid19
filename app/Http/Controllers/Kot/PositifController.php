<?php

namespace App\Http\Controllers\Kot;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function index(Request $req)
    {
        return view('dashboard.pages.dashboard');
    }
}
