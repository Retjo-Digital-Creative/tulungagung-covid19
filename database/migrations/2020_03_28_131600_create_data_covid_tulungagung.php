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
            $table->integer('jumlah_positif')->nullable()->default(0);
            $table->integer('jumlah_meninggal')->nullable()->default(0);
            $table->integer('jumlah_sembuh')->nullable()->default(0);
            $table->integer('jumlah_odp')->nullable()->default(0);
            $table->integer('jumlah_pdp')->nullable()->default(0);
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
