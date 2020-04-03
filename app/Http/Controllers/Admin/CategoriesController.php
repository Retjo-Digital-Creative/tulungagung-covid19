<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Category::latest()->get();
            return datatables()->of($data)
                        ->addColumn('action', function($data) {
                            return '<a class="btn btn-xs btn-danger delete" href="javascript:void(0)" data-id="'. $data->id .'"><i class="far fa-trash-alt"></i> Delete</a> | <a href="javascript:void(0)" data-id="'. $data->id .'" class="btn btn-xs btn-primary edit"><i class="far fa-edit"></i> Edit</a>';
                        })
                        ->rawColumns(['action'])
                        ->toJson();
        }

        return view('admin.category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        Category::create($request->all());
        return response()->json(['code' => 200, 'message' => 'Kategori berhasil ditambahkan!']);
    }

    public function getData($id)
    {
        $data = Category::find($id);
        return response()->json($data);
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
        $data = Category::find($id);
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories,slug,' . $id
        ]);

        $data->update($request->all());
        return response()->json(['code' => 200, 'message' => 'Kategori sukses dirubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return response()->json(['code' => 200, 'message' => 'Kategori berhasil dihapus!']);
    }
}
