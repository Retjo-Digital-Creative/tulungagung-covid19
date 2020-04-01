<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Berita;
use Yajra\DataTables\Html\Builder;
use DataTables;
use App\Category;
use App\User;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public $html;

    public function __construct(Builder $builder)
    {
        $this->html = $builder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Berita::published()->latest()->paginate(6);
        return view('berita.index', [
            'news' => $news
        ]);
    }

    public function adminIndex(Request $request)
    {
        if($request->ajax()) {
            $data = Berita::with(['category', 'author'])->with('author')->latest();
            return DataTables::eloquent($data)
            ->addColumn('action', function($data) {
                return '<a class="btn btn-xs btn-danger delete" href="'. route('admin.berita.delete', $data->id) .'"><i class="far fa-trash-alt"></i> Delete</a> | <a href="#" class="btn btn-xs btn-primary edit"><i class="far fa-edit"></i> Edit</a>';
            })
            ->editColumn('title', function($data) {
                return Str::limit($data->title, 30);
            })
            ->addColumn('category', function(Berita $berita) {
                return $berita->category->title;
            })
            ->addColumn('author', function(Berita $berita) {
                return $berita->author->name;
            })
            ->toJson();
        }

        return view('admin.berita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
