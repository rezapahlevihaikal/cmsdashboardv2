<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBisnisIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bisnis_income', function (Blueprint $table) {
            $table->id();
            $table->integer('core_bisnis_id');
            $table->string('sub_domain');
            $table->bigInteger('pendapatan');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->longText('description');
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
        Schema::dropIfExists('bisnis_incomes');
    }
}