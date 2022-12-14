<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBisnisExpandituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bisnis_expanditure', function (Blueprint $table) {
            $table->id();
            $table->integer('core_bisnis_id');
            $table->string('sub_domain');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('kategori_id');
            $table->bigInteger('nominal');
            $table->longText('keterangan');
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
        Schema::dropIfExists('bisnis_expanditures');
    }
}
