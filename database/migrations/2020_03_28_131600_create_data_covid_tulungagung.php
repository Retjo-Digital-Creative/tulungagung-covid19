<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCovidTulungagung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_covid_tulungagung', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kecamatan');
            $table->integer('jumlah_positif');
            $table->integer('jumlah_meninggal');
            $table->integer('jumlah_sembuh');
            $table->integer('jumlah_odp');
            $table->integer('jumlah_pdp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_covid_tulungagung');
    }
}
