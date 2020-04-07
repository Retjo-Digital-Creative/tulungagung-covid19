<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataCovid;

class ApiController extends Controller
{
	public $headers;

	public function __construct()
	{
		$this->headers = [
			'Access-Control-Allow-Origin' => '*'
		];
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
