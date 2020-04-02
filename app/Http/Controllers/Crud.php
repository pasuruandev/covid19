<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;

trait Crud {

    public $crud_name = "";
    protected $self_validate = false;

    /**
     * get Model.
     *
     * @return \Illuminate\Database\Eloquent\Model model
     */
    public function model()
    {
        return \DB::class;
    }

    /**
     * get view path.
     *
     * @return Directory String
     */
    public function view_path()
    {
        return 'pages';
    }

    /**
     * get validator.
     *
     * @return ValidatorConfig Array or false
     */
    public function validator($action, $req, $current = NULL)
    {
        return false;
    }

    /**
     * get withInputError.
     *
     * @return Input Array or false
     */
    public function withInputError($req)
    {
        return $req->input();
    }

    /**
     * get entity entity on create and edit.
     *
     * @return Entity Array
     */
    public function entity($action, $req)
    {
        return [];
    }

    /**
     * get route name of main route crud.
     *
     * @return route_name String
     */
    public function main_route()
    {
        return 'master';
    }

    /**
     * get storage / get.
     *
     * @return ArrayFile Array
     */
    public function getStorage($model)
    {
        return false;
    }

    /**
     * get data / get.
     *
     * @return \Illuminate\Http\Response json
     */
    public function get(Request $req, $key)
    {
        try {
            $id = decrypt($key);
            $res = $this->query($req)->findOrFail($id);
            if ($storage = $this->getStorage($res)) $res->storage = $storage;
        } catch (\Exception $th) {
            $res = "";
        }
        
        return response()->json($res);
    }

    /**
     * get query.
     *
     * @return Query
     */
    public function query(Request $req)
    {
        return $this->model()::query();
    }

    /**
     * get data for datatable / get.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $req)
    {
        $query = $this->query($req);
        return Datatables::of($query)
                ->editColumn('key', '{{ encrypt($id) }}')
                ->make(true);
    }

    /**
     * get index / get.
     *
     * @return \Illuminate\Http\Response
     */
    public function render(Request $request)
    {
        return $this->res(function($data) {
            return view($this->view_path() . '.index', $data);
        });
    }

    /**
     * Show add page / get.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $label = __('info.label.add');
        $this->page_config['subtitle'] = $label;
        
        return $this->res(function($data) {
            return view($this->view_path() . '.add', $data);
        });
    }

    /**
     * Store Files.
     *
     * @return 
     */
    public function store($action, $model, Request $req)
    {
        
    }

    /**
     * Delete stored Files.
     *
     * @return 
     */
    public function deleteStore($model, $req)
    {
        
    }

    /**
     * Show save add model / post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        // validate input
        $validator = $this->validator('create', $req);
        if ($validator) $valid = $this->validate($req, $validator);
        if ($this->self_validate && !is_null($valid)) return $valid;

        // insert data
        try {
            $model = $this->model()::create($this->entity('create', $req));
            $this->store('create', $model, $req);
        } catch (\Exception $e) {
            if (@$model) $model->delete();
            return redirect()->back()
                    ->withInput($this->withInputError($req))
                    ->withErrors(['err' => 'Fatal Error !! | ' . $e->getMessage()]);
        }

        return redirect()->route($this->main_route())
                ->with('message.success', __('messages.success.save', ['name' => $this->crud_name]));
    }

    /**
     * edit page / get.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $key)
    {
        $label = __('info.label.edit');
        $this->page_config['subtitle'] = $label;

        try {
            $id = decrypt($key);
            $current = $this->model()::findOrFail($id);
            
            return $this->res(function($data) {
                return view($this->view_path() . '.edit', $data);
            }, [
                'current' => $current,
                'key' => $key
            ]);
        } catch (\Exception $th) {
            return redirect()->route($this->main_route())
                    ->withErrors(['err' => __('messages.error.notfound', ['name' => $this->crud_name])]);
        }
    }

    /**
     * update / put.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        try {
            $id = decrypt($id);
            $current = $this->model()::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->back()
                    ->withInput($this->withInputError($req))
                    ->withErrors(['err' => __('messages.error.notfound', ['name' => $this->crud_name])]);
        }
        
        // validate input
        $validator = $this->validator('update', $req, $current);
        if ($validator) $valid = $this->validate($req, $validator);
        if ($this->self_validate && !is_null($valid)) return $valid;

        // update data
        try {
            $this->store('update', $current, $req);
            foreach ($this->entity('update', $req) as $key => $value) {
                $current->$key = $value;
            }
            $save = $current->save();
        } catch (\Exception $e) {
            return redirect()->back()
                    ->withInput($this->withInputError($req))
                    ->withErrors(['err' => 'Fatal Error !! | ' . $e->getMessage()]);
        }

        return redirect()->route($this->main_route())
                ->with('message.success', __('messages.success.edit', ['name' => $this->crud_name]));
    }

    /**
     * delete / delete.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        // validate input
        $valid = $this->validate($req, [
            'key' => 'required'
        ]);
        if ($this->self_validate && !is_null($valid)) return $valid;

        try {
            $id = decrypt($req['key']);
            $current = $this->model()::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()->back()
                    ->withInput($this->withInputError($req))
                    ->withErrors(['err' => __('messages.error.notfound', ['name' => $this->crud_name])]);
        }

        try {
            $this->deleteStore($current, $req);
            $current->delete();
        } catch (\Exception $e) {
            return redirect()->back()
                    ->withInput($this->withInputError($req))
                    ->withErrors(['err' => 'Fatal Error !! | ' . $e->getMessage()]);
        }

        return redirect()->route($this->main_route())
                ->with('message.success', __('messages.success.delete', ['name' => $this->crud_name]));
    }

}