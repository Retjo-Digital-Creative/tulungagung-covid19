<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\DataCovid;

class CovidController extends Controller
{
	public function fetchData(){
		$data = DataCovid::select(
			[
				"nama_kecamatan",
				"jumlah_odp",
				"jumlah_pdp",
				"jumlah_positif",
				"jumlah_sembuh",
				"jumlah_meninggal",
				DB::raw("jumlah_odp + jumlah_pdp + jumlah_sembuh + jumlah_positif + jumlah_meninggal as jumlah_total")
			])->get();
		return response()->json($data);
	}
}
