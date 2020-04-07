<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_id');
            $table->foreign('data_id')->references('id')->on('data_covid_tulungagung')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('data_histories');
    }
}
