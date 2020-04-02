<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataCovid as Data;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DataCovidRequest as DataRequest;

class DataCovid extends Controller
{
    public $html;

    public function __construct(Builder $builder)
    {
        $this->html = $builder;
    }

    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Data::latest()->get();
            return datatables()->of($data)->addColumn('action', function($data) {
                return '<a class="btn btn-xs btn-danger delete" href="javascript:void(0)" data-id="'. $data->id .'"><i class="far fa-trash-alt"></i> Delete</a> | <a href="javascript:void(0)" class="btn btn-xs btn-primary edit" data-id="'. $data->id .'"><i class="far fa-edit"></i> Edit</a>';
            })->make(true);
        }

        $columns = [
            ['data' => 'nama_kecamatan', 'name' => 'nama_kecamatan', 'title' => 'Kecamatan'],
            ['data' => 'jumlah_positif', 'name' => 'jumlah_positif', 'title' => 'Jumlah Positif'],
            ['data' => 'jumlah_meninggal', 'name' => 'jumlah_meninggal', 'title' => 'Jumlah Meninggal'],
            ['data' => 'jumlah_sembuh', 'name' => 'jumlah_sembuh', 'title' => 'Jumlah Sembuh'],
            ['data' => 'jumlah_odp', 'name' => 'jumlah_odp', 'title' => 'Jumlah ODP'],
            ['data' => 'jumlah_pdp', 'name' => 'jumlah_pdp', 'title' => 'Jumlah PDP'],
        ];

    	return view('admin.data.index', [
            'html' => $html,
        ]);
    }

    /**
     * Get data covid JSON
     * 
     * @return \Illuminate\Http\Response
     */
    public function newData(DataRequest $request)
    {
        $validated = $request->validated();
        $data = [
            'nama_kecamatan' => $request->nama_kecamatan,
            'jumlah_positif' => $request->jumlah_positif ? $request->jumlah_positif : 0,
            'jumlah_meninggal' => $request->jumlah_meninggal ? $request->jumlah_meninggal : 0,
            'jumlah_sembuh' => $request->jumlah_sembuh ? $request->jumlah_sembuh : 0,
            'jumlah_odp' => $request->jumlah_odp ? $request->jumlah_odp : 0,
            'jumlah_pdp' => $request->jumlah_pdp ? $request->jumlah_pdp : 0
        ];

        $create = Data::create($data);
        return response($create);
    }

    public function getData($id)
    {
        $data = Data::find($id);
        return response()->json($data);
    }

    public function updateData($id, DataRequest $request)
    {
        $validated = $request->validated();
        $data = [
            'nama_kecamatan' => $request->nama_kecamatan,
            'jumlah_positif' => $request->jumlah_positif ? $request->jumlah_positif : 0,
            'jumlah_meninggal' => $request->jumlah_meninggal ? $request->jumlah_meninggal : 0,
            'jumlah_sembuh' => $request->jumlah_sembuh ? $request->jumlah_sembuh : 0,
            'jumlah_odp' => $request->jumlah_odp ? $request->jumlah_odp : 0,
            'jumlah_pdp' => $request->jumlah_pdp ? $request->jumlah_positif : 0
        ];

        $update = Data::find($id);
        $update->update($data);
    }

    /**
     * Delete data covid
     * 
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
    	$data = Data::find($id);
    	$data->delete();
        return response($data);
    }
}
