<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
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
        return view('dashboard.pages.content.article');
    }

    public function data(Request $req)
    {
        return Datatables::of(Article::get())
                ->editColumn('key', '{{ encrypt($id) }}')
                ->make(true);
    }

    public function get(Request $req, $key)
    {
        $key = decrypt($key);
        $res = Article::find($key);
        return response($res);
    }

    public function insert(Request $req)
    {
        try {
            $this->validate($req, [
                'title' => 'required',
                'content' => 'required',
                'header' => 'mimes:jpeg,png,gif'
            ]);

            $file = $req->file('header');
            $filename = "";
            if (!empty($file)) {
                $filename = time() ."_". strtolower(str_replace(' ', '', trim($file->getClientOriginalName())));
                $destination = 'assets/img/article';
                $file->move($destination, $filename);
            }

            $insert = [
                'title' => $req->input('title'),
                'content' => $req->input('content'),
                'header' => $filename,
            ];
            $model = Article::create($insert);
            if (!$model) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            if ($model) $model->delete();
            return response($e->getMessage(), 500);
        }
    }

    public function update(Request $req)
    {
        try {
            $this->validate($req, [
                'title' => 'required',
                'content' => 'required',
                'header' => 'mimes:jpeg,png,gif'
            ]);

            $file = $req->file('header');
            $filename = "";
            $destination = 'assets/img/article';
            if (!empty($file)) {
                $filename = time() ."_". strtolower(str_replace(' ', '', trim($file->getClientOriginalName())));
                $file->move($destination, $filename);
            }

            $key = decrypt($req->input('key'));
            $model = Article::findOrFail($key);
            $model->title = $req->input('title');
            $model->content = $req->input('content');
            if (!empty($filename)) {
                if (!empty($model->header)) {
                    if (file_exists($destination ."/". $model->header)) {
                        unlink($destination ."/". $model->header);
                    }
                }
                $model->header = $filename;
            }
            $save = $model->save();

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
            $model = Article::findOrFail($key);
            $destination = 'assets/img/article';
            if (!empty($model->header)) {
                if (file_exists($destination ."/". $model->header)) {
                    unlink($destination ."/". $model->header);
                }
            }

            $save = $model->delete();
            if (!$save) throw new Exception("Error", 500);
            return response('Success', 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
