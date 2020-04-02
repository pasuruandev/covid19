<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class PermissionsController extends Controller
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
        return view('dashboard.pages.admin.permissions', [
            'users' => User::all(),
            'menus' => menus()
        ]);
    }

    public function data(Request $req)
    {
        return Datatables::of(Permission::query())
                ->editColumn('key', '{{ encrypt($id) }}')
                ->make(true);
    }

    public function get(Request $req, $key)
    {
        $key = decrypt($key);
        return response(Permission::find($key));
    }

    public function insert(Request $req)
    {
        try {
            if ($req->input('password') != $req->input('password_confirm')) throw new \Exception("Password Tidak Sama", 500);
            Permission::create([
                'username' => $req->input('username'),
                'menu' => $req->input('menu'),
                'actions' => $req->input('actions')
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
            $data = Permission::findOrFail($key);
            $data->username = $req->input('username');
            $data->menu = $req->input('menu');
            $data->actions = $req->input('actions');
            $save = $data->save();
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
            $user = Permission::findOrFail($key);
            $save = $user->delete();
            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
