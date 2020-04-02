<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
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
        return view('dashboard.pages.admin.users');
    }

    public function data(Request $req)
    {
        return Datatables::of(User::query())
                ->editColumn('key', '{{ encrypt($username) }}')
                ->make(true);
    }

    public function get(Request $req, $key)
    {
        $key = decrypt($key);
        return response(User::find($key));
    }

    public function insert(Request $req)
    {
        try {
            if ($req->input('password') != $req->input('password_confirm')) throw new \Exception("Password Tidak Sama", 500);
            User::create([
                'username' => $req->input('username'),
                'name' => $req->input('name'),
                'password' => password_hash($req->input('password'), PASSWORD_BCRYPT)
            ]);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function update(Request $req)
    {
        try {
            if ($req->input('password') != $req->input('password_confirm')) throw new \Exception("Password Tidak Sama", 500);
            $key = decrypt($req->input('key'));
            $user = User::findOrFail($key);
            $user->name = $req->input('name');
            if ($req->input('password') != "") 
                $user->password = password_hash($req->input('password'), PASSWORD_BCRYPT);
            $save = $user->save();
            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    public function delete(Request $req)
    {
        try {
            $key = decrypt($req->input('key'));
            $user = User::findOrFail($key);
            $save = $user->delete();
            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
