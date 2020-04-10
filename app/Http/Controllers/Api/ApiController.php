<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataCovid;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
	public $headers;

	public function __construct()
	{
		$this->headers = [
			'Access-Control-Allow-Origin' => '*'
		];
	}

    public function chart(){
		$data = array(
			'jumlah_positif' => array(),
			'jumlah_meninggal' => array(),
			'jumlah_sembuh' => array(),
			'jumlah_odp' => array(),
			'jumlah_pdp' => array()
		);
		$dates = array();
		for($i=6; $i>=0; $i--){
			$date = date('Y-m-d', strtotime("-{$i} day"));
			$temp = DB::select("SELECT SUM(jumlah_positif) as jumlah_positif, SUM(jumlah_meninggal) as jumlah_meninggal, SUM(jumlah_sembuh) as jumlah_sembuh, SUM(jumlah_odp) as jumlah_odp, SUM(jumlah_pdp) as jumlah_pdp FROM (SELECT * FROM (SELECT * FROM ((SELECT * FROM data_covid_tulungagung as a) UNION ALL (SELECT a.id, a.nama_kecamatan, b.jumlah_positif, b.jumlah_meninggal, b.jumlah_sembuh, b.jumlah_odp, b.jumlah_pdp, b.created_at, b.updated_at from data_histories as b inner join data_covid_tulungagung a on a.id = b.data_id)) tbl where DATE(updated_at) <= '{$date}' order by updated_at desc) tbl GROUP BY id) tbl");
			if(!empty($temp[0])){
				$data['jumlah_positif'][] = $temp[0]->jumlah_positif;
				$data['jumlah_meninggal'][] = $temp[0]->jumlah_meninggal;
				$data['jumlah_sembuh'][] = $temp[0]->jumlah_sembuh;
				$data['jumlah_odp'][] = $temp[0]->jumlah_odp;
				$data['jumlah_pdp'][] = $temp[0]->jumlah_pdp;
			}
			$dates[] = $date;
		}
		return response()->json([
			'data' => $data,
			'date' => $dates
		])->withHeaders($this->headers);
    }

    public function getData()
    {
    	$data = DataCovid::with('history')->get();
    	return response()->json($data)->withHeaders($this->headers);
    }

    public function getDataWithQuery($query)
    {
    	switch ($query) {
    		case 'positif':
    		case 'Positif':
    			$value = DataCovid::sum('jumlah_positif');
    			$data['Jumlah Positif'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;

    		case 'sembuh':
    		case 'Sembuh':
    			$value = DataCovid::sum('jumlah_sembuh');
    			$data['Jumlah Sembuh'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;

    		case 'meninggal':
    		case 'Meninggal':
    			$value = DataCovid::sum('jumlah_meninggal');
    			$data['Jumlah Meninggal'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;

    		case 'odp':
    		case 'ODP':
    			$value = DataCovid::sum('jumlah_odp');
    			$data['Jumlah ODP'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;

    		case 'pdp':
    		case 'PDP':
    			$value = DataCovid::sum('jumlah_pdp');
    			$data['Jumlah PDP'] = $value;
    			return response()->json($data)->withHeaders($this->headers);
    			break;
    		
    		default:
    			return redirect()->route('api.data.get');
    			break;
    	}
    }
}
