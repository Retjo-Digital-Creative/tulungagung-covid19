<?php

use Illuminate\Database\Seeder;
use App\DataCovid as Data;

class DataCovidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'nama_kecamatan' => 'Bandung',
	        	'jumlah_positif' => 0,
	        	'jumlah_meninggal' => 0,
	        	'jumlah_sembuh' => 0,
	        	'jumlah_odp' => 33,
	        	'jumlah_pdp' => 2
        	],
        	[
        		'nama_kecamatan' => 'Kalidawir',
	        	'jumlah_positif' => 0,
	        	'jumlah_meninggal' => 0,
	        	'jumlah_sembuh' => 0,
	        	'jumlah_odp' => 23,
	        	'jumlah_pdp' => 1
        	]
        ];

        foreach($data as $d) {
        	Data::create($d);
        }
    }
}
