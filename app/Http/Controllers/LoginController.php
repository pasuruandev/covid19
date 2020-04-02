<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
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
        return view('dashboard.pages.login');
    }

    public function auth(Request $req, $flag = 'nonajax')
    {
        $user = User::find($req->input('username'));
        if ($user && password_verify($req->input('password'), $user->password)) {
            Auth::guard()->login($user);
            if ($flag == 'nonajax') return redirect()->route('dashboard.index');
            else return response("Success", 200);
        } else {
            if ($flag == 'nonajax') return redirect()->route('login.index');
            else return response("Unauthorized.", 401);
        }
    }

    public function logout(Request $req)
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
