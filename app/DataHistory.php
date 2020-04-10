<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataHistory extends Model
{
    protected $fillable = [
    	'data_id',
    	'jumlah_positif',
    	'jumlah_meninggal',
    	'jumlah_sembuh',
    	'jumlah_odp',
		'jumlah_pdp',
		'created_at',
		'updated_at'
	];

    public function data()
    {
    	return $this->belongsTo(DataCovid::class);
    }
}
