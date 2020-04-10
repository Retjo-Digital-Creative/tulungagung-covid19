<?php

namespace App\Observers;

use App\DataCovid;
use App\DataHistory;

class DataCovidObserver
{
    /**
     * Handle the data covid "updated" event.
     *
     * @param  \App\DataCovid  $dataCovid
     * @return void
     */
    public function updating(DataCovid $dataCovid)
    {
        $original = $dataCovid->getOriginal();
        DataHistory::create([
            'data_id' => $dataCovid->id,
            'jumlah_positif' => $original['jumlah_positif'],
            'jumlah_meninggal' => $original['jumlah_meninggal'],
            'jumlah_sembuh' => $original['jumlah_sembuh'],
            'jumlah_odp' => $original['jumlah_odp'],
            'jumlah_pdp' => $original['jumlah_pdp'],
            'created_at' => $original['created_at'],
            'updated_at' => $original['updated_at']
        ]);
    }
}
